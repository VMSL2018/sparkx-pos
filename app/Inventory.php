<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Inventory extends Model implements AuditableContract
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'invoice_cost',
        'lot_number',
        'item_code',
        'products_id',
        'product_name',
        'category',
        'supplier_id',
        'supplier_name',
        'total_item',
        'unit_cost',
        'transportation_cost',
        'selling_price',
        'gp_taka',
        'gp_margin',
        'showroom_id',
        'showroom_name',
        'warehouse_id',
        'warehouse_name',
        'return_status',
        'selling_status',
        'unit_total_cost',
        'created_at',
        'updated_at'
    ];
}
