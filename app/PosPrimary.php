<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class PosPrimary extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'pos_session_code';

    protected $fillable = [
        'pos_session_code',
        'invoice',
        'employee_id',
        'customer_type',
        'customer_number',
        'subtotal_price',
        'discount_price',
        'tax',
        'total_price',
        'payment_method',
        'transaction_id',
        'showroom',
        'weekday',
        'created_at',
        'updated_at',
    ];
}
