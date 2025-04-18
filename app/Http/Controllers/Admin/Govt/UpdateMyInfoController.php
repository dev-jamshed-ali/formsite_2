<?php

namespace App\Http\Controllers\Admin\Govt;

use App\Http\Controllers\Controller;
use App\Models\Admin\Govt\Govt;
use Illuminate\Http\Request;

class UpdateMyInfoController extends Controller
{
    
    public function index()
    {
        $govt = Govt::where('govt_id',session('id'))->first();
        return view('admin.govt.index',compact('govt'));
    }

    public function store(Request $request)
    {
        Govt::updateOrCreate(['govt_id'=>session("id")],$request->only([
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
          return back()->with('success','Form submitted successfully');
    }
}
