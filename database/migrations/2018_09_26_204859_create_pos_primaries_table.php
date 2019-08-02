<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosPrimariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_primaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pos_session_code')->unique()->nullable();
            $table->string('invoice')->unique()->nullable();
            $table->string('employee_id')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('subtotal_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('tax')->nullable();
            $table->string('total_price')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('showroom')->nullable();
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
        Schema::dropIfExists('pos_primaries');
    }
}
