<?php

namespace App\Http\Controllers\Admin\Education;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Education\Education;

class EducationUpateMyInfoController extends Controller
{
    //
public function index()
{
    $education = Education::where('education_id', session('id'))->first();
    return view('admin.education.index', compact('education'));
}

public function store(Request $request)
{
    Education::updateOrCreate(['education_id' => session("id")], $request->only([
        "first_name",
        "last_name",
        "building_number",
        "apartment_number",
        "street_name",
        "state",
        "city",
        "country",
        "zipcode",
        "country_code",
        "dob",
        "help_description",
        "email",
        "phone",
    ]));
    return back()->with('success', 'Form submitted successfully');
}
}





