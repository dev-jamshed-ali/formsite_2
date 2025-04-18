<?php

namespace App\Models\Admin\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'education_id',
        'first_name',
        'last_name',
        'building_number',
        'apartment_number',
        'state',
        'city',
        'email',
        'phone',
        'street_name',
        'country',
        'zipcode', 
        'country_code',
        'dob',
        'help_description'
    ];
    use HasFactory;
}
