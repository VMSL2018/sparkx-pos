<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pos_session_code')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_name')->nullable();
            $table->string('itemcode')->nullable();

            $table->string('tag_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('bonus')->nullable();

            $table->string('employee_id')->nullable();
            $table->string('employee_name')->nullable();

            $table->string('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();
            
            $table->string('return_reason')->nullable();
            $table->string('status')->nullable();
           
            $table->string('weekday')->nullable();
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
        Schema::dropIfExists('pos');
    }
}
