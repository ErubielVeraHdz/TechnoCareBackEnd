<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
    
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreU');
            $table->string('emailU');
            $table->string('dispositivo');
            $table->string('numserie');
            $table->string('modelo');
            $table->text('descripcion');
            $table->string('tipomto')->default('preventivo');
            $table->timestamps();
        });
    }

   
};
