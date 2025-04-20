<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('currency_id'); 
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->enum('status_profit', ['win', 'lose', ''])->default('');
            $table->decimal('value', 10, 2); 
            $table->timestamp('start_order_at');
            $table->timestamp('end_order_at')->nullable(); 
            $table->decimal('stop_loss', 10, 4)->nullable();
            $table->decimal('take_profit', 10, 4)->nullable();
            $table->decimal('order_value', 10, 4); 
            $table->timestamps();

            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onDelete('cascade'); 
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
