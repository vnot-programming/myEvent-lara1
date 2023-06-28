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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('tittle')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->longText('description')->nullable();
            $table->integer('customer_limit')->nullable();
            $table->integer('t_soldout')->nullable();
            $table->dateTime('sale_start_date', $precision = 0)->nullable();
            $table->dateTime('sale_end_date', $precision = 0)->nullable();
            $table->unsignedBigInteger('sale_price')->nullable();
            $table->boolean('is_donation')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
