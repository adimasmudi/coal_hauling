<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDocumentStatus extends Model
{
    use HasFactory;

    protected $table = 'vehicle_document_statusses';
    protected $fillable = [
        'name'
    ];
}
