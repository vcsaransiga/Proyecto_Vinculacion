<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementUnit extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_unit';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'measurement_units';
    protected $fillable = [
        'id_unit',
        'name',
        'symbol',
    ];
}
