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
        Schema::create('pihaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pihak');
            $table->string('nomor_perkara');
            $table->enum('hadir_sebagai', ['Prinsipal', 'Kuasa']);
            $table->timestamps();
        });

        Schema::create('dinas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_kantor');
            $table->string('ke_bagian');
            $table->timestamps();
        });

        Schema::create('ptsps', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('no_hp');
            $table->integer('ke_meja');
            $table->timestamps();
        });

        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_hp');
            $table->string('universitas');
            $table->integer('jumlah_klinis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pihaks');
        Schema::dropIfExists('dinas');
        Schema::dropIfExists('ptsps');
        Schema::dropIfExists('mahasiswas');
    }
};
