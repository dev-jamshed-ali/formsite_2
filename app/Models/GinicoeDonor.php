<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GinicoeDonor extends Model
{
    use HasFactory;

    // table name
    protected $table = 'ginicoe_donors';

    // primaryKey
    protected $primaryKey = 'id';


    protected $fillable = [ 
        'name',
        'email',
        'amount',
    ]; 

    protected $guarded = []; 
}
