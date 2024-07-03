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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->bigInteger('proyecto_id')->unsigned()->nullable(false);
            $table->string('nombre', 255)->nullable(false);
            $table->integer('estado')
                ->default(2)
                ->comment('1 = Completada, 2 = Pendiente, 3 = Cancelada')
                ->check('estado IN (1, 2, 3)');
            $table->date('fecha')->nullable(false);
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
