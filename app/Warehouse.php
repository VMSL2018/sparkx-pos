<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Warehouse extends Model  implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'warehouse_code','warehouse_name','warehouse_address','created_at','updated_at'
    ];
}
