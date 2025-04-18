<?php

namespace App\Http\Controllers\Api\Tracker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Tracker\Tracker;
class TrackerUpateMyInfoController extends Controller
{
    public function index()
    {
        $tracker = Tracker::where('tracker_id', session('id'))->first();
        return response()->json( ['success' => __('Fetched successfully!'), "record" => $tracker], 200); 
    }

    public function store(Request $request)
    {
        $tracker = Tracker::updateOrCreate(['tracker_id' => session("id")], $request->only([
            "first_name",
            "last_name",
            "building_number",
            "apartment_number",
            "state",
            "city",
            "email",
            "phone",
            "date_of_birth",
            "legal_sex"
        ]));
        return response()->json(['success' => true, 'message' => 'form submitted successfully', "record" => $tracker]);
    }
}