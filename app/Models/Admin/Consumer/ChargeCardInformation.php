<?php

namespace App\Models\Admin\Consumer;

use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeCardInformation extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'charge_card_information';

    public function facialImage()
    {
        return $this->hasOne(FacialImageUpload::class, 'consumer_id', 'consumer_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'consumer_id', 'id');
    }
}
