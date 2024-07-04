<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CategoriesWarehouse extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'categories_warehouse';
    protected $primaryKey = 'id_catware';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_catware',
        'name',
    ];
}
