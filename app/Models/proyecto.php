<?php

namespace App\Models;

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

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id', 'usuario_id');
    }
}
