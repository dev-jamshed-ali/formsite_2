<?php

namespace App\Http\Controllers\Admin\Healthcare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Healthcare\Healthcare;

class HealthcareUpateMyInfoController extends Controller
{

    public function index()
    {
        $healthcare = Healthcare::where('healthcare_id', session('id'))->first();
        return view('admin.healthcare.index', compact('healthcare'));
    }

    public function store(Request $request)
    {
        Healthcare::updateOrCreate(['healthcare_id' => session("id")], $request->only([
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
        return back()->with('success', 'Form submitted successfully');
    }
}
