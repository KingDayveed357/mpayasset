<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('recipient_id')->nullable(); // If the recipient is a registered user
            $table->string('crypto_type');
            $table->decimal('amount', 20, 8); // Adjust precision/scale based on your needs
            $table->decimal('crypto_amount', 20, 8); // Amount in cryptocurrency
            $table->string('recipient_address');
            $table->string('status')->default('pending'); // Transaction status (pending, completed, failed, etc.)
            $table->string('transaction_reference')->unique(); // Unique reference for tracking
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
