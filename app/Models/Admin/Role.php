<?php

namespace App\Models\Admin;

use App\Models\Documents;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name'
    ];
    public function documents()
    {
        return $this->hasMany(Documents::class);
    }

}
