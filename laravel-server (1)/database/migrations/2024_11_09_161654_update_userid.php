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
        Schema::table('transactions', function (Blueprint $table) {
            // Change 'userid' column to match the foreign key relationship properly
            $table->unsignedBigInteger('userid')->change();
            
            // Define foreign key relationship (assuming it references the 'id' column in the 'users' table)
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['userid']);
            
            // Optionally, revert the column change if needed
            $table->dropColumn('userid');
        });
    }
};
