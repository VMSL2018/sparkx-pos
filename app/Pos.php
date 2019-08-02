<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Pos extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'pos_session_code';

    protected $fillable = [
        'pos_session_code',
        'product_code',
        'product_name',
        'itemcode',
        'tag_price',
        'discoount_price',
        'total_price',
        'bonus',
        'supplier_id',
        'supplier_name',
        'return_reason',
        'status',
        'weekday',
        'created_at',
        'updated_at'
    ];
}
