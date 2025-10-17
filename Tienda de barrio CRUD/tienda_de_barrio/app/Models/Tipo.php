<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    // Nombre real de la tabla en la BD
    protected $table = 'tipos_productos';

    // Clave primaria
    protected $primaryKey = 'id_tipo';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre_tipo',
        'descripcion',
    ];

    // Laravel gestionará automáticamente created_at y updated_at
    public $timestamps = true;

    // Relación: un tipo tiene muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_tipo');
    }
}