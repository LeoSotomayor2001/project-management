<?php

namespace App\Models;

use Carbon\Carbon;
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
    public function formatFecha()
    {
        return Carbon::parse($this->fecha)->format('d/m/Y');
    }
    public function proyecto()
    {
        return $this->belongsTo(proyecto::class, 'proyecto_id', 'id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'tareas_usuarios', 'tarea_id', 'user_id');
    }
}
