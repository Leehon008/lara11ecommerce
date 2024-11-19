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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_method')->nullable(); // Add payment method
            $table->text('cart_items')->nullable();      // Add cart items (store serialized or JSON data)
            $table->decimal('tax', 10, 2)->nullable();   // Add tax
            $table->decimal('subTotal', 10, 2)->nullable(); // Add subtotal
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'cart_items', 'tax', 'subTotal']);
        });
    }
};
