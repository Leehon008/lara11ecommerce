<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('paynowreference')->nullable();
        $table->string('reference')->unique();
        $table->decimal('amount', 10, 2);
        $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
        $table->enum('payment_method', ['paynow', 'delivery']);
        $table->longText('cart_items')->nullable();
        $table->decimal('tax', 10, 2)->nullable();
        $table->decimal('subTotal', 10, 2)->nullable();
        $table->text('pollurl')->nullable();
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