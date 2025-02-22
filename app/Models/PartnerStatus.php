<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerStatus extends Model
{
    use HasFactory;

    protected $table = 'partner_statusses';
    protected $fillable = [
        'name'
    ];
}
