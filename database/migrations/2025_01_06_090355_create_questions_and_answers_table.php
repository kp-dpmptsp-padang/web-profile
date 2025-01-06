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
        Schema::create('questions_and_answers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penanya');
            $table->string('email_penanya');
            $table->string('pertanyaan');
            $table->foreignId('id_penjawab')->constrained('users');
            $table->text('jawaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions_and_answers');
    }
};
