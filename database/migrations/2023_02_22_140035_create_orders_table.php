<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('community_id')->nullable();
            $table->integer('qty');
            $table->string('customer_name')->default('guest');
            $table->string('customer_phone');
            $table->string('payment_method')->default('cash');
            $table->string('down_payment')->default('0');
            $table->string('total_price');
            $table->string('estimate_time')->nullable();
            $table->enum('payment_status' , ['down_payment' , 'paid' , 'unpaid'])->default('unpaid');
            $table->enum('status' , ['pending' , 'distribute' , 'production' , 'on_hold' , 'production_done','shipping' , 'done'])->default('pending');
            $table->string('note')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
