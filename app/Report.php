<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Report extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;

    //
}
