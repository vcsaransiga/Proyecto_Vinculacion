<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_catitem';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'categories_items';
    protected $fillable = [
        'id_catitem',
        'name',
        'description',
    ];
}
