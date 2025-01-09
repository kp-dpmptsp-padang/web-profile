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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('caption')->nullable()->default(null);
            $table->string('nama_file');
            $table->string('mine_type');
            $table->string('alt_text')->nullable()->default(null);
            $table->decimal('urutan')->nullable()->default(null);
            $table->morphs('imageable'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
