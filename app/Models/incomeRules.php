<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incomeRules extends Model
{
    use HasFactory;
    protected $table = 'income_rules';

    
    protected $fillable = ['income_range','upper_limit','lower_limit', 'score'];

}
