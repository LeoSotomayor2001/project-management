<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tareas';

    protected $fillable = [
        'id',
        'proyecto_id',
        'nombre',
        'estado',
        'fecha'
    ];

    public function getEstadoTextoAttribute()
    {
        switch ($this->estado) {
            case 1:
                return 'Completada';
            case 2:
                return 'Pendiente';
            case 3:
                return 'Cancelada';
            default:
                return 'Desconocido';
        }
    }
    public function proyecto()
    {
        return $this->belongsTo(proyecto::class, 'proyecto_id', 'id');
    }
}
