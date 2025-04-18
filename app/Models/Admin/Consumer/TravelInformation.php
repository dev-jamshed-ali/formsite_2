<?php

namespace App\Models\Admin\Consumer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\children;
class TravelInformation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function children()
    {
        return $this->hasMany(children::class, 'consumer_id');
    }
}
