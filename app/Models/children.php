<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class children extends Model
{
    use HasFactory;
    protected $table = 'children';
    protected $fillable = [
        'old_first_name',
        'old_last_name',
        'old_dob',
        'old_spouse_first_name',
        'old_spouse_last_name',
        'old_spouse_dob',
        'consumer_id',
    ];
}
