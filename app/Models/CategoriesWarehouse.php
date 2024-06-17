<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesWarehouse extends Model
{
    use HasFactory;

    protected $table = 'categories_warehouse';
    protected $primaryKey = 'id_catware';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_catware',
        'name',
    ];
}
