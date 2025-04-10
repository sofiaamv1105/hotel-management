<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nombre', 'ubicación', 'número_telefono', 'email_contacto'];
}
