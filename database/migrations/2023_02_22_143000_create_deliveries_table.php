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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('expedition_id');
            $table->enum('status' , ['waiting_pickup' ,'otw' , 'delivered' , 'done'])->default('otw');
            $table->string('estimated_time')->default('7 day');
            $table->string('delivery_date');
            $table->text('note')->default('no note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
