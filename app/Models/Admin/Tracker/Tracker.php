<?php

namespace App\Models\Admin\Tracker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;
    protected $table="tracker";
    protected $fillable = [
        'tracker_id',
        'first_name',
        'last_name',
        'building_number',
        'apartment_number',
        'state',
        'city',
        'email',
        'phone',
        'date_of_birth',
        'legal_sex'
    ];
}
