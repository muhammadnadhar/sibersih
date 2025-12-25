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

            $table->string('judul');
            $table->string('kategori');
            $table->text('deskripsi')->nullable();
            $table->string("nama_pelapor");
            $table->string("nama_petugas")->nullable(); // di update sat di tugaskan oleh admin

            $table->string('image_laporan');
            $table->string('image_laporan_selesai')->nullable();


            $table->enum('status', ['pending', 'ditugaskan', 'selesai', 'urgent'])
                ->default('pending');

            $table->string('lokasi')->nullable();
            $table->timestamp('tanggal_laporan')->useCurrent();

            // foreignId == foreign + on("id")
            // Admin bisa menghapus laporan
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();

            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->foreign('petugas_id')->references('id')->on('petugas')->nullOnDelete();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();

            $table->timestamps();
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
