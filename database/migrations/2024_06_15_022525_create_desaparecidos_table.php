<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void {
        Schema::create('desaparecidos', function (Blueprint $table) {
            $table->id();
            $table->integer('publicado_por');
            $table->string('foto');
            $table->string('nombre', 100);
            $table->date('fecha_nacimiento');
            $table->string('sexo', 1);
            $table->string('direccion_residencia');
            $table->string('discapacidad')->nullable();
            $table->date('ultimo_avistamiento');
            $table->string('nombre_contacto', 100);
            $table->string('telefono_contacto', 15);
            $table->string('whatsapp_contacto', 15)->nullable();
            $table->integer('ult_actualizacion_id')->nullable();
            $table->timestamps();
            $table->timestamp('soft_delete')->nullable();
        });
    }

    
    public function down(): void {
        Schema::dropIfExists('desaparecidos');
    }
    
};
