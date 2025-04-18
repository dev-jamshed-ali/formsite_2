<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageOwner extends Model
{
    use HasFactory;

    // table name
    protected $table = 'package_owners';

    // primaryKey
    protected $primaryKey = 'id';


    protected $fillable = [ 
        'admin_id',
        'name',
        'email', 
        'package_type',
        'amount',
        'expire_at',  
    ]; 

    protected $guarded = [];
}