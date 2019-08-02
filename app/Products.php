<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Products extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;

    protected function information(){
        return $this->hasMany(Inventory::class);
    }

    protected $fillable = [
        'product_code',
        'product_name',
        'category',
        'required_quantity',
        'reorder_level',
        'reorder_status',
        'created_at',
        'updated_at',
    ];
}
