<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Tags\HasTags;

class Item extends Model implements Auditable
{
    use HasFactory, HasTags;
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'id_item';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_item',
        'id_catitem',
        'id_unit',
        'id_pro',
        'name',
        'description',
        'date',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryItem::class, 'id_catitem', 'id_catitem');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_pro', 'id_pro');
    }

    public function unit()
    {
        return $this->belongsTo(MeasurementUnit::class, 'id_unit', 'id_unit');
    }
}
