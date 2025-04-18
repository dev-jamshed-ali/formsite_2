<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travel_information', function (Blueprint $table) {
            // List B columns to add
            $columnsToAdd = [
                "us_visa_expiration_date" => 'date',
                "visa_purpose" => 'string',
                "state_driver_license" => 'string',
            ];

            // List A columns to drop
            $columnsToDrop = [
                "country_of_issuance_foriegn_country",
                "foreign_passport_number",
                "us_permit",
                "us_govt_id_number",
                "us_driving_license_number",
                "witsec",
                "old_first_name",
                "old_last_name",
                "old_mi",
                "old_dob",
                "old_spouse_first_name",
                "old_spouse_last_name",
                "old_spouse_mi",
                "old_spouse_dob",
                "old_first_name_1st_daughter",
                "old_last_name_1st_daughter",
                "old_mi_1st_daughter",
                "old_dob_1st_daughter",
                "old_first_name_2nd_daughter",
                "old_last_name_2nd_daughter",
                "old_mi_2nd_daughter",
                "old_dob_2nd_daughter",
                "old_first_name_1st_son",
                "old_last_name_1st_son",
                "old_mi_1st_son",
                "old_dob_1st_son",
                "old_first_name_2nd_son",
                "old_last_name_2nd_son",
                "old_mi_2nd_son",
                "old_dob_2nd_son",
                "to_see_global_look_alike",
                "like_to_have_global_look_alike"
            ];

            // Add columns from List B not in List A
            foreach ($columnsToAdd as $column => $type) {
                if (!Schema::hasColumn('travel_information', $column)) {
                    $table->$type($column)->nullable();
                }
            }

            // Drop columns from List A not in List B
            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('travel_information', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travel_information', function (Blueprint $table) {
            // Recreate columns dropped in the up() method
            $columnsToDrop = [
                "country_of_issuance_foriegn_country" => 'string',
                "foreign_passport_number" => 'string',
                "us_permit" => 'string',
                "us_govt_id_number" => 'string',
                "us_driving_license_number" => 'string',
                "witsec" => 'string',
                "old_first_name" => 'string',
                "old_last_name" => 'string',
                "old_mi" => 'string',
                "old_dob" => 'date',
                "old_spouse_first_name" => 'string',
                "old_spouse_last_name" => 'string',
                "old_spouse_mi" => 'string',
                "old_spouse_dob" => 'date',
                "old_first_name_1st_daughter" => 'string',
                "old_last_name_1st_daughter" => 'string',
                "old_mi_1st_daughter" => 'string',
                "old_dob_1st_daughter" => 'date',
                "old_first_name_2nd_daughter" => 'string',
                "old_last_name_2nd_daughter" => 'string',
                "old_mi_2nd_daughter" => 'string',
                "old_dob_2nd_daughter" => 'date',
                "old_first_name_1st_son" => 'string',
                "old_last_name_1st_son" => 'string',
                "old_mi_1st_son" => 'string',
                "old_dob_1st_son" => 'date',
                "old_first_name_2nd_son" => 'string',
                "old_last_name_2nd_son" => 'string',
                "old_mi_2nd_son" => 'string',
                "old_dob_2nd_son" => 'date',
                "to_see_global_look_alike" => 'string',
                "like_to_have_global_look_alike" => 'string'
            ];

            // List B columns to drop in down() method
            $columnsToAdd = [
                "us_visa_expiration_date",
                "visa_purpose",
                "state_driver_license",
            ];

            // Recreate columns dropped in the up() method
            foreach ($columnsToDrop as $column => $type) {
                if (!Schema::hasColumn('travel_information', $column)) {
                    $table->$type($column)->nullable();
                }
            }

            // Drop columns added in the up() method
            foreach ($columnsToAdd as $column) {
                if (Schema::hasColumn('travel_information', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
