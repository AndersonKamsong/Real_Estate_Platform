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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->enum('type', ['rent', 'buy']);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('sqft');
            $table->string('location');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['available', 'sold', 'rented'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
