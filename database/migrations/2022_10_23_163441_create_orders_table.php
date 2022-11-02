<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('items');
            $table->text('payment_details');
            $table->enum('status', ['pending', 'processing', 
                        'on-hold', 'completed', 'cancelled', 
                        'refunded', 'failed', 'trash'])->default('pending');
            $table->string('currency');
            $table->string('cart_hash');
            $table->string('line_total');
            $table->string('quantity');
            $table->string('shipping_fee');
            $table->text('cart_content');
            $table->string('total');
            $table->text('address');
            $table->string('user')->nullable();
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
};
