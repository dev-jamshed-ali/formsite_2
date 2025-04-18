<?php
namespace App\Http\Controllers\Api\Education;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Education\Education;

class EducationUpateMyInfoController extends Controller
{
public function index()
{
    $education = Education::where('education_id', session('id'))->first();
    return response()->json( ['success' => __('Fetched successfully!'), "record" => $education], 200); 
}

public function store(Request $request)
{
    $education = Education::updateOrCreate(['education_id' => session("id")], $request->only([
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
   return response()->json(['success' => true, 'message' => 'form submitted successfully', "record" => $education]);
}
}