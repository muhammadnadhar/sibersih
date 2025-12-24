<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Utils\Random;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('fullname')->nullable();
            $table->string('email')->unique();

            $table->string("avatar")->nullable()->default("/image/default.webp"); // path Image
            $table->string("invite_code"); // code grupe dari admin , default nantik random dari admin

            // info lain 
            $table->string("phone")->nullable();
            $table->string("address")->nullable();

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
