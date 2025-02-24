<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerSupply extends Model
{
    public function partner()
    {
        return $this->belongsTo(Partner::class,'partner_id');
    }
}
