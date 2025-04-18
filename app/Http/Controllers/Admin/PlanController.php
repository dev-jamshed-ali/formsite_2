<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\houses;
use Illuminate\Http\Request;
use App\Models\Admin\Plan;
use App\Models\Admin\PlanFeature;

class PlanController extends Controller
{
    //

    public function index(){

        // return "SSS";
        try {
            $data = Plan::withCount('planFeature')->get();
           return view('admin.plan.index',compact('data'));
        } catch (\Throwable $th) {
            $data=[];
            return view('admin.plan.index',compact('data'));
        }



    }


    public function create(){

        // return "Create";

        return view('admin.plan.create');
    }


    public function store(Request $request){

        
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'status' => 'required',
            'description' => 'required',
            'feature' => 'required',
            'stripe_link' => 'required',
        ]);
        // return $request->all();

        $plan = new Plan();
        $plan->title = $request->title;
        $plan->stripe_link = $request->stripe_link;
        $plan->price = $request->price;
        $plan->status = $request->status;
        $plan->description = $request->description;
        $plan->save();

        foreach($request->feature as $value){

            $planFeature = new PlanFeature();
            $planFeature->plan_id = $plan->id;
            $planFeature->detail = $value;
            $planFeature->save();
        }

        return redirect()->route('admin.plan.index')->with('success', 'Plan is added successfully!');


    }


    public function edit($id){
        // return $id;
         $plan = Plan::where('id',$id)->with('planFeature')->first();

         return view('admin.plan.edit',compact('plan'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'status' => 'required',
            'description' => 'required',
            'feature' => 'required',
            'stripe_link' => 'required',
        ]);

        $plan = Plan::find($id);
        $plan->title = $request->title;
        $plan->stripe_link = $request->stripe_link;
        $plan->price = $request->price;
        $plan->status = $request->status;
        $plan->description = $request->description;
        $plan->save();

        PlanFeature::where('plan_id',$id)->delete();
        foreach($request->feature as $value){

            $planFeature = new PlanFeature();
            $planFeature->plan_id = $plan->id;
            $planFeature->detail = $value;
            $planFeature->save();
        }
        return redirect()->route('admin.plan.index')->with('success', 'Plan is updated successfully!');

    }


    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return Redirect()->back()->with('success', 'Plan is deleted successfully!');
    }
}
