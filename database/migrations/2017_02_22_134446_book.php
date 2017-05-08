<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id');            
            $table->string('title');            
            $table->string('autor');            
            $table->string('editora');            
            $table->string('edicion_date');//fecha de la primera impresion            
            $table->double('precio',6,2);
            $table->integer('cant_hojas')->nullable();
            $table->string('tipo');//revista,libro,manual,etc...
            $table->string('ciudad');
            $table->string('pais');
            $table->longText('descripcion');
            $table->boolean('copyright');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
