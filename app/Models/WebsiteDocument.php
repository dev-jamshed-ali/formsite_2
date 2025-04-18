<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteDocument extends Model
{
    use HasFactory;

    protected $table = 'website_documents';

  
    protected $fillable = [
        'name',
        'pdf_url',
        'is_shown',
    ];
}
