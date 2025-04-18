<?php

namespace App\Models\Admin\Healthcare;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Healthcare extends Model
{
    use HasFactory;
    protected $fillable = [
        'healthcare_id',
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
}
