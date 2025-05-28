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
        Schema::create('produks', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('kode', 25);
            $table->string('nama', 100);
            $table->string('satuan_id', 100);
            $table->string('kategori_id', 100);
            $table->string('brand_id', 100);

            $table->double('harga', 15, 8)->nullable()->default(0.00);
            $table->double('hpp', 15, 8)->nullable()->default(0.00);

            $table->text('keterangan');

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('produk_team', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('produk_id')->constrained('produks')->onDelete('cascade');
            $table->foreignUuid('team_id')->constrained('teams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
        Schema::dropIfExists('produk_team');
    }
};
