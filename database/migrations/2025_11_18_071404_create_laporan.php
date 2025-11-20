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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();

            // pelapor
            $table->unsignedBigInteger('user_id');

            // admin yang mengelola laporan
            $table->unsignedBigInteger('admin_id')->nullable();

            // petugas yang akan menangani
            $table->unsignedBigInteger('petugas_id')->nullable();

            $table->string('judul');
            $table->string('kategori');
            $table->text('deskripsi')->nullable();
            $table->string('file');

            // status proses laporan
            $table->enum('status', ['pending', 'diproses', 'ditugaskan', 'selesai'])
                ->default('pending');

            // tambahan opsional
            $table->string('lokasi')->nullable();
            $table->timestamp('tanggal_laporan')->nullable();

            $table->timestamps();

            // foreign key
            //onDelete('set null') digunakan pada foreign key (relasi tabel) agar ketika data induk dihapus, nilai foreign key di tabel anak akan di-set menjadi NULL
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('petugas_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
