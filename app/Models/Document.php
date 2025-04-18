<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Role;
class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'document_name',
        'file_path',
        'role_id'
    ];

    // Relationship with Role model
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
