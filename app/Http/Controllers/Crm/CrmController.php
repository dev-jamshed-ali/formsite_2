<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\scores;


class CrmController extends Controller
{

    public function getDashboardStats()
    {
        $data = [
            'consumers' => Admin::where('role_id', 4)->count(),
            'merchants' => Admin::where('role_id', 7)->count(),
            'government' => Admin::where('role_id', 8)->count(),
            'bankers' => Admin::where('role_id', 9)->count(),
            'education' => Admin::where('role_id', 10)->count(),
            'healthcare' => Admin::where('role_id', 11)->count(),
            'recently_completed' => Admin::where('role_id', 4)
                ->where('form_completion', 1)
                ->get(), 
            'monthly_registrations' => Admin::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
                ->groupBy('month')
                ->orderBy('month')
                ->get(),
            'scores_data' => scores::where('change_type', 'increment')
                ->selectRaw('DATE(created_at) as date, AVG(new_value) as average_score')
                ->groupBy('date')
                ->orderBy('date')
                ->get()
        ];
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }
    public function getAllUSers()
    {
            $consumers = Admin::whereIn('role_id', [1, 13])->get(['id', 'role_id','name', 'phone', 'email', 'status', 'guid', 'total_score', 'form_completion', 'created_at', 'updated_at']);
            return response()->json([
                'status' => 'success',
                'message' => 'Fetched all consumers successfully.',
                'data' => $consumers
            ], 200);
         
    }
}