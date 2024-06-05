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
        Schema::create('coffee_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coffee_product_id')->nullable();
            $table->foreign('coffee_product_id')->references('id')->on('coffee_products')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('unit_cost', 8, 2);
            $table->decimal('selling_price', 8, 2)->nullable();
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => 'Database\Seeders\CoffeeProductsSeeder',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_sales');
    }
};
