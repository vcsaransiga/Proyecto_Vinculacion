<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Kardex extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'id_kardex';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'kardex';

    protected $fillable = [
        'id_kardex',
        'id_ope',
        'id_ware',
        'id_pro',
        'name',
        'description',
        'date',
        'quantity',
        'price',
        'balance',
    ];

    public function operationType()
    {
        return $this->belongsTo(OperationType::class, 'id_ope', 'id_ope');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'id_ware', 'id_ware');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_pro', 'id_pro');
    }
}
