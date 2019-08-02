<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Showroom extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable =[
        'showroom_code',
        'showroom_name',
        'showroom_address',
        'created_at',
        'updated_at'
    ];
}
