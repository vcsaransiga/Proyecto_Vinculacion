<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationType extends Model
{
    use HasFactory;

    protected $table = 'operations_type';

    protected $primaryKey = 'id_ope';

    protected $fillable = [
        'name',
        'mov_type',
    ];
}
