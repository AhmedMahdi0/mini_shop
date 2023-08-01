<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('inventory_id');
            $table->string('status');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->primary(['user_id', 'item_id', 'inventory_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
