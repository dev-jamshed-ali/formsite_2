<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = "plans";
    protected $guarded = [];

    public function planFeature(){

        return $this->hasMany(PlanFeature::class);
    } 
}
