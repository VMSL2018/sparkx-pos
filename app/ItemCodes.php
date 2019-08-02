<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ItemCodes extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;


    protected $table = 'itemcodes';
}
