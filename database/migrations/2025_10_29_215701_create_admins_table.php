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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->string("password");
            $table->string("email")->unique();
            // admin punya penghubung ke petugas dan user
            $table->foreignId("user_id")->references("id")->on("user")->onDelete("cascade");
            $table->foreignId("petugas_id")->references("id")->on("petugas")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
