<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_stud';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_stud',
        'card_id',
        'name',
        'last_name',
        'course',
        'hours',
    ];
}
