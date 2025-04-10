<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habitacion extends Model
{
    use HasFactory;
    protected $table = 'habitacions';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['hotel_id', 'número', 'tipo', 'precio_por_noche'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
