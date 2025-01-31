<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Buyer who made the inquiry
            $table->foreignId('property_id')->constrained()->onDelete('cascade'); // Property being inquired about
            $table->string('name'); // Buyer's name
            $table->string('email'); // Buyer's email
            $table->text('message'); // Inquiry message
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};