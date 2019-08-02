<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ReturnItem extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'returns';
    protected $fillable = [
        'item_code',
        'return_reason',
        'created_at',
        'updated_at'
    ];
}
