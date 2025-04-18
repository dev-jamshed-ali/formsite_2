<?php

namespace App\Models\Admin\Consumer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FindMeHere extends Model
{
    use HasFactory;
    protected $table = 'find_me_here';
    protected $guarded = [];
}
