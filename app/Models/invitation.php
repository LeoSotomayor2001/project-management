<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitation extends Model
{
    use HasFactory;
    protected $fillable = [
        'proyecto_id',
        'user_id',
        'invited_user_id',
    ];
}
