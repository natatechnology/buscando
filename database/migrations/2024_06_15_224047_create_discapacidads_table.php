<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('discapacidads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->integer('ult_actualizacion_id')->nullable();
            $table->timestamps();
            $table->timestamp('soft_delete')->nullable();
        });


        // Insertar datos iniciales
        DB::table('discapacidads')->insert([
            ['id' => 1, 'nombre' => 'Discapacidad visual',      'ult_actualizacion_id' => 1, 'created_at' => '2024-06-15 00:00:00'],
            ['id' => 2, 'nombre' => 'Discapacidad auditiva',    'ult_actualizacion_id' => 1, 'created_at' => '2024-06-15 00:00:00'],
            ['id' => 3, 'nombre' => 'Discapacidad motora',      'ult_actualizacion_id' => 1, 'created_at' => '2024-06-15 00:00:00'],
            ['id' => 4, 'nombre' => 'Discapacidad intelectual', 'ult_actualizacion_id' => 1, 'created_at' => '2024-06-15 00:00:00'],
            ['id' => 5, 'nombre' => 'Discapacidad psicosocial', 'ult_actualizacion_id' => 1, 'created_at' => '2024-06-15 00:00:00'],
        ]);
        
    }


    public function down(): void {
        Schema::dropIfExists('discapacidads');
    }

};
