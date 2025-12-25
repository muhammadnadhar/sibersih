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
            $table->string("fullname")->nullable();
            $table->string("password");
            $table->string("email")->unique();

            $table->string("avatar")->nullable()->default("/image/default.webp"); // path Image

            // petugas info
            $table->string("area")->nullable(); // area petugas di tugaskan


            // forend key ke admin
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->string("phone")->nullable();
            $table->string('address')->nullable();

            $table->string("invite_code"); // code grupe dari admin

            $table->rememberToken();
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
