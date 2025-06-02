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
        Schema::create('brands', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode', 100);
            $table->string('nama', 100);
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('brand_team', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('team_id')->constrained('teams')->onDelete('cascade');
            $table->foreignUuid('brand_id')->constrained('brands')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
