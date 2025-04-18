<?php

namespace App\Http\Controllers\Api\Govt;

use App\Http\Controllers\Controller;
use App\Models\Admin\Govt\Govt;
use Illuminate\Http\Request;

class UpdateMyInfoController extends Controller
{
    public function index(Request $request)
    {
        $govt_id = session('id') ?? $request->govt_id;
        if (!$govt_id) {
            return response()->json(['error' => 'Govt ID not found'], 400);
        }
        $govt = Govt::where('govt_id', $govt_id)->first();
        return response()->json(['success' => __('Fetched successfully!'), "record" => $govt], 200);
    }

    public function store(Request $request)
    {
        $govt_id = session('id') ?? $request->govt_id;

        if (!$govt_id) {
            return response()->json(['error' => 'Govt ID not found'], 400);
        }

        $govt = Govt::updateOrCreate(['govt_id' => $govt_id], $request->only([
            "first_name",
            "last_name",
            "title",
            "building_no",
            "street_name",
            "urbanization_name",
            "state",
            "city",
            "county",
            "zipcode",
            "country_code",
            "primary_telephone_no",
            "agency",
            "agency_description",
            "agency_name",
            "budgeting_authority",
            "budgeting_amount",
            "help_description"
        ]));
        return response()->json(['success' => true, 'message' => 'form submitted successfully', "record" => $govt]);
    }
}
