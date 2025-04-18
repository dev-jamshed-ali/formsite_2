<?php

namespace App\Models\Admin\Consumer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacialImageUpload extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'facial_image_uploads';

}
