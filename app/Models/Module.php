<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Module extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'id_mod';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_mod',
        'id_responsible',
        'id_period',
        'name',
        'start_date',
        'end_date',
        'vinculation_hours',
        'status',
    ];

    public function responsible()
    {
        return $this->belongsTo(Responsible::class, 'id_responsible');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'id_period');
    }


    public function students()
    {
        return $this->belongsToMany(Student::class, 'mod_stud', 'id_mod', 'id_stud');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'mod_projects', 'id_mod', 'id_pro');
    }
}
