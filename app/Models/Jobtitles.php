<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobtitles extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];
}
