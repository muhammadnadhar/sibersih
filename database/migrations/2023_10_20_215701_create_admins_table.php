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
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // local key untuk petuas dan users terhubung

            $table->string("username");
            $table->string("password");
            $table->string("avatar")->nullable()->default("/image/default.webp"); // path Image
            $table->string("email")->unique();
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
        Schema::dropIfExists('admins');
    }
};
