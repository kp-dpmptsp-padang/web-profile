<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            $table->string('noHp');
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('umur');
            $table->enum('jk', ['L', 'P']);
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('layanan');
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_responses');
    }
};