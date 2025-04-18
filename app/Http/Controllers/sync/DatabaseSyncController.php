<?php

namespace App\Http\Controllers\sync;
use App\Http\Controllers\Controller;
use App\Models\Admin\Consumer\ChargeCardInformation;
use Illuminate\Http\Request;
use DB;

class DatabaseSyncController extends Controller
{
    /**
     * Get data or SQL dump based on the flag.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $flag = $request->input('flag');
        $missingTables = $request->input('missingTables', []);
        if ($flag === 'empty') {
            $db = $this->generateSqlDump();
            // $db_data= $this->generateSqlData();
            return response()->json(['sql_content' => $db]);
        } elseif ($flag === 'today') {
            $updatedData = $this->getUpdatedData();
            return response()->json($updatedData);
        }
        return response()->json(['error' => 'Invalid flag provided.'], 400);
    }




    protected function generateSqlDump()
    {
        // Get the database name from the configuration
        $database = env('DB_DATABASE');

        // Check if the database exists
        $databaseCheck = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$database]);
        if (empty($databaseCheck)) {
            return response()->json(['error' => "Database '$database' does not exist."], 404);
        }

        // Retrieve all tables in the database
        $tables = DB::select("SHOW TABLES");
        $sqlFileContent = "";

        foreach ($tables as $table) {
            $tableName = array_values((array) $table)[0];

            // Get the CREATE TABLE statement for each table
            $createTableResult = DB::select("SHOW CREATE TABLE `$tableName`");
            if ($createTableResult) {
                $createTableRow = (array) $createTableResult[0];
                $ifNotExists = " IF NOT EXISTS ";
                $queryCreateTableParts = explode("`$tableName`", $createTableRow['Create Table']);
                $withIfNotExists = $queryCreateTableParts[0] . $ifNotExists . "`" . $tableName . "` " . $queryCreateTableParts[1];
                $sqlFileContent .= $withIfNotExists . ";\n\n";
            } else {
                return false;
            }

            // Retrieve all rows of data from the table
            $tableData = DB::select("SELECT * FROM `$tableName`");
            if (!empty($tableData)) {
                $sqlFileContent .= $this->generateInsertStatements($tableName, $tableData) . "\n\n";
            }
        }

        return $sqlFileContent;
    }
    protected function generateInsertStatements($tableName, $tableData)
    {
        $sql = "INSERT INTO `$tableName` (";
        $columns = array_keys((array) $tableData[0]);
        $sql .= "`" . implode("`, `", $columns) . "`) VALUES \n";

        $insertValues = [];
        foreach ($tableData as $row) {
            $row = (array) $row;
            $values = array_map(function ($value) {
                return is_null($value) ? 'NULL' : "'" . addslashes($value) . "'";
            }, $row);

            $insertValues[] = "(" . implode(", ", $values) . ")";
        }

        $sql .= implode(",\n", $insertValues) . ";";

        return $sql;
    }
    /**
     * Get data updated in the last 24 hours.
     *
     * @return array
     */
    protected function getUpdatedData()
    {
        $updatedData = [];
        $tables = [
            'my_pidegree_information',
            'find_me_here',
            'gender_identity_information',
            'ethnicity_information',
            'my_neighborhood_information',
            'employment_information',
            'charge_card_information',
            'facial_image_uploads',
            'travel_information',
            'attestation_information',
        ];

        foreach ($tables as $table) {
            $updatedData[$table] = DB::table($table)
                ->where('created_at', '>=', now()->subDay())
                ->orWhere('updated_at', '>=', now()->subDay())
                ->get()
                ->toArray();
        }

        return $updatedData;
    }
    public function getAllUserInfo()
    {
        try {
            $data = ChargeCardInformation::with(['facialImage:consumer_id,facial_image', 'admin:id,guid'])->get();
            $transformedData = $data->map(function ($item) {
                return [
                    'id' => $item->id,
                    'consumer_id' => $item->consumer_id,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                    'card_number' => $item->card_number,
                    'nickname' => $item->nickname,
                    'primary_first_name' => $item->primary_first_name,
                    'primary_last_name' => $item->primary_last_name,
                    'cvc' => $item->cvc,
                    'name_of_bank' => $item->name_of_bank,
                    'expiry_date' => $item->expiry_date,
                    'card_has_card_has_secondary_auth_user' => $item->card_has_card_has_secondary_auth_user,
                    'facial_image' => $item->facialImage->facial_image ?? '',
                    'guid' => $item->admin->guid ?? null,
                ];
            });

            return response()->json($transformedData);
        } catch (\Exception $e) {
            \Log::error("Error in getAllUserInfo: ", ['error' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred while fetching user information'], 500);
        }
    }
}