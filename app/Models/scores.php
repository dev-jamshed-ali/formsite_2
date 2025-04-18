<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Admin;
class scores extends Model
{
    use HasFactory;
    protected $table = 'scores';
    protected $fillable = [
        'admin_id',
        'old_value',
        'score_value',
        'new_value',
        'change_type',
        'change_due_to',
        'change_reason',
    ];

    /**
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
