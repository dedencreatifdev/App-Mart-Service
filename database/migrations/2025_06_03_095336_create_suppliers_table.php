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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->timestamps();
        });

        // Schema::create('suppliers_team', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignUuid('team_id')->constrained('teams')->onDelete('cascade');
        //     $table->foreignUuid('suppliers_id')->constrained('suppliers')->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
