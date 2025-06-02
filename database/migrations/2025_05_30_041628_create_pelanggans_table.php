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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->string('kota', 100)->nullable();
            $table->string('kode_pos', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('no_telp', 100)->nullable();
            $table->string('logo')->nullable();
            $table->boolean('status')->default(true);

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('pelanggan_team', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('team_id')->constrained('teams')->onDelete('cascade');
            $table->foreignUuid('pelanggan_id')->constrained('pelanggans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
        Schema::dropIfExists('pelanggan_team');
    }
};
