<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyectos';

    protected $fillable = [
        'id',
        'usuario_id',
        'nombre',
        'descripcion',
    ];
    public function formatFecha(){
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'proyecto_usuarios', 'proyecto_id', 'user_id');
    }
    public function tareas(){
        return $this->hasMany(tarea::class, 'proyecto_id', 'id');
    }
}
