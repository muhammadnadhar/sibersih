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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->string("password");
            $table->string("email")->unique();

            // forend key ke admin
            $table->unsignedBigInteger('petugas_id');
            $table->foreign('petugas_id')->references('id')->on('admin')->onDelete('cascade');

            $table->string("telepon")->nullable();
            $table->json("report_success")->nullable();   // simpna laporan yang sudah di siapin
            $table->json("report_pandding")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
