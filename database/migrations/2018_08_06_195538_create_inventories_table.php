<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('invoice_number')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('invoice_cost')->nullable();
            $table->string('lot_number')->nullable();

            $table->string('item_code')->nullable();


            $table->string('products_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('category')->nullable();

            $table->string('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();

            $table->string('total_item')->nullable();
            $table->string('unit_cost')->nullable();
            $table->string('transportation_cost')->nullable();
            $table->string('unit_total_cost')->nullable();
            $table->string('selling_price')->nullable();


            $table->string('gp_taka')->nullable();
            $table->string('gp_margin')->nullable();

            $table->string('showroom_id')->nullable();
            $table->string('showroom_name')->nullable();

            $table->string('warehouse_id')->nullable();
            $table->string('warehouse_name')->nullable();


            $table->boolean('return_status')->default(false);
            $table->boolean('selling_status')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
