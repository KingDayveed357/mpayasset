<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKycDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kyc_documents', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('userid'); // Foreign key linking to users table
            $table->string('document_type'); // Type of document (e.g., 'National ID', 'Passport')
            $table->string('document_path'); // Path to the document file
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Document status
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kyc_documents');
    }
}
