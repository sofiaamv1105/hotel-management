<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'habitacions';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['habitacion_id', 'fecha_inicio', 'fecha_fin', 'cliente_nombre', 'cliente_email'];

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }
}
