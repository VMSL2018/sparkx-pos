<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Settings extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;

        protected $fillable = [
        'title',
        'value',
        'created_at',
        'updated_at'
    ];
}
