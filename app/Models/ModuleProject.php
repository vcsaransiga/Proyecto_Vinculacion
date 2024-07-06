<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ModuleProject extends Model implements Auditable
{
    use HasFactory;

    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'mod_projects';
    protected $primaryKey = ['id_pro', 'id_mod'];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pro', 'id_mod'];
}
