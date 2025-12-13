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

            $table->string('file_path');

            $table->enum('status', ['pending', 'ditugaskan', 'selesai'])
                ->default('pending');

            $table->string('lokasi')->nullable();
            $table->timestamp('tanggal_laporan')->useCurrent();

            // foreignId == foreign + on("id")
            // Admin bisa menghapus laporan
            $table->foreignId('admin_id')->nullable()->constrained('admins')->cascadeOnDelete();

            // users & petugas set nullable
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('petugas_id')->nullable()->constrained('petugas')->nullOnDelete();

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
