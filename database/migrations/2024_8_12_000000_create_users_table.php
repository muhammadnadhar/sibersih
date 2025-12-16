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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();

            $table->string("avatar")->nullable()->default("/image/default.webp"); // path Image
            $table->string("invite_code"); // code grupe dari admin

            // foreign key ke admin
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnDelete(); //user dimiliki/dikelola oleh seorang admin.



            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
