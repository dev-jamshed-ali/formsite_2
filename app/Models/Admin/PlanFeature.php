<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasFactory;
    protected $table = "plan_features";
    protected $guarded = [];

    public function plan(){

        return $this->belongTo(Plan::class);
    }
}
