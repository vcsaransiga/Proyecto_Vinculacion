<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleStudent extends Model
{
    use HasFactory;

    protected $table = 'mod_stud';
    protected $primaryKey = ['id_stud', 'id_mod'];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_stud', 'id_mod'];
}
