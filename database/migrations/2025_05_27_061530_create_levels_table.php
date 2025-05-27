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
        Schema::create('levels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            // $table->boolean('lihat')->nullable()->default(false);
            // $table->boolean('tambah')->nullable()->default(false);
            $table->timestamps();
        });
        Schema::create('level_team', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('level_id')->constrained('levels')->onDelete('cascade');
            $table->foreignUuid('team_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
