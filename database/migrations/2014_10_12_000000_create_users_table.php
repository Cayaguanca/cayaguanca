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

            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('email', 100)->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto', 2048)->nullable();
            $table->rememberToken();

            // Restricciones para llave foranea de roles
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');

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