<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gender;
use App\Models\houses;
use App\Models\incomeRules;
use Illuminate\Http\Request;

class ScorringRulesController extends Controller
{
    public function housingRules(){
        try {
            $data = houses::get();
            $app_url=env('app_url');
           return view('admin.housing.index',compact('data','app_url'));
        } catch (\Throwable $th) {
            $data=[];
            return view('admin.housing.index',compact('data'));
        }
    }
    public function updateScore(Request $request){
        try {
            $rule = houses::find($request->id);
            if ($rule) {
                $rule->score = $request->score;
                $rule->save();
        
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false]);
        }
    }
    public function genderRules(){
        try {
            $data = gender::get();
            $app_url=env('app_url');
           return view('admin.gender.index',compact('data','app_url'));
        } catch (\Throwable $th) {
            $data=[];
            return view('admin.gender.index',compact('data'));
        }
    }
    public function genderScore(Request $request){
        try {
            $rule = gender::find($request->id);
            if ($rule) {
                $rule->score = $request->score;
                $rule->save();
        
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false]);
        }
    }
    public function incomeRules(){
        try {
            $data = incomeRules::get();
            $app_url=env('app_url');
           return view('admin.income.index',compact('data','app_url'));
        } catch (\Throwable $th) {
            $data=[];
            return view('admin.income.index',compact('data'));
        }
    }
    public function updateIncomeRules(Request $request){
        try {
            $rule = incomeRules::find($request->id);
            if ($rule) {
                $rule->score = $request->score;
                $rule->save();
        
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false]);
        }
    }

}
