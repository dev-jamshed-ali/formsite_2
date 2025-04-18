<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EulaSetting extends Model
{
    protected $table = 'eula_settings';
    
    protected $fillable = [
        'admin_type',
        'pdf_file',
        'is_active',
        'admin_id',
        'has_agreed',
        'agreed_at'
    ];

    protected $dates = [
        'agreed_at',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'has_agreed' => 'boolean'
    ];

    public function admin()
    {
        return $this->belongsTo(\App\Models\Admin\Admin::class, 'admin_id');
    }
}
