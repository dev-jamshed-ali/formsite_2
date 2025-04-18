<?php

namespace App\Http\Controllers\Admin\Tracker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Tracker\Tracker;

class TrackerUpateMyInfoController extends Controller
{
    //
    public function index()
    {
        $tracker = Tracker::where('tracker_id', session('id'))->first();
        return view('admin.tracker.index', compact('tracker'));
    }

    public function store(Request $request)
    {
        Tracker::updateOrCreate(['tracker_id' => session("id")], $request->only([
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
        return back()->with('success', 'Form submitted successfully');
    }
}





