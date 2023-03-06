<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('file_name')->nullable();
            $table->string('file_extension')->nullable();
            $table->string('file_path')->nullable();
            
            // Llave foránea de proyecto
            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('restrict')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_proyectos');
    }
};
