<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Task extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'id_task';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_task',
        'id_pro',
        'name',
        'description',
        'hours',
        'start_date',
        'end_date',
        'percentage',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_pro', 'id_pro');
    }


    public function getStatusAttribute($value)
    {
        $statuses = [
            'pending' => 'Pendiente',
            'completed' => 'Completado',
        ];

        return $statuses[$value] ?? $value;
    }
}
