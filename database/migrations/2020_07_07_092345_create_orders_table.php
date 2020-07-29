<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');   
            $table->integer('customer_id'); 
            $table->integer('payment_id');
            $table->integer('sub_total');  
            $table->integer('vat');
            $table->integer('referral_code');  
            $table->integer('promo_code'); 
            $table->integer('discount'); 
            $table->integer('shipping_charge');
            $table->integer('total');
            $table->integer('delivery_man_id');
            $table->string('notes');
            $table->integer('shipping_id')->nullable;
            $table->date('shipping_date');
            $table->date('delivery_date');
            $table->string('status');
            $table->date('date_time');
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
        Schema::dropIfExists('orders');
    }
}
