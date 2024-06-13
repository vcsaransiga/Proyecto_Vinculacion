<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_period';

    protected $fillable = [
        'name',
        'academic_year',
        'start_date',
        'end_date',
    ];
}
