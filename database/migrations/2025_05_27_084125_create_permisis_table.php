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
        Schema::create('permisis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->string('name');
            $table->boolean('lihat')->nullable()->default(false);
            $table->boolean('tambah')->nullable()->default(false);
            $table->timestamps();
        });

        Schema::create('permisi_team', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('team_id')->constrained('teams')->onDelete('cascade');
            $table->foreignUuid('permisi_id')->constrained('permisis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisis');
    }
};
