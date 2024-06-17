<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_responsible';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_responsible',
        'name',
        'last_name',
        'area',
        'role',
        'status',
    ];
}
