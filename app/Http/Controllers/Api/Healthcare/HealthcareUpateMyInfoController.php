<?php
namespace App\Http\Controllers\Api\Healthcare;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Healthcare\Healthcare;

class HealthcareUpateMyInfoController extends Controller
{
    public function index()
    {
        $healthcare = Healthcare::where('healthcare_id', session('id'))->first();
        return response()->json( ['success' => __('Fetched successfully!'), "record" => $healthcare], 200); 
    }

    public function store(Request $request)
    {
        $healthcare = Healthcare::updateOrCreate(['healthcare_id' => session("id")], $request->only([
        "first_name",
        "last_name",
        "building_number",
        "apartment_number",
        "state",
        "city",
        "email",
        "phone",
        "street_name",
        "country",
        "zipcode",
        "country_code",
        "dob",
        "help_description"
        ]));
        return response()->json(['success' => true, 'message' => 'form submitted successfully', "record" => $healthcare]);
    }
}
