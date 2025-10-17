<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // 🔸 Nombre exacto de la tabla
    protected $table = 'productos';

    // 🔸 Nombre de la clave primaria
    protected $primaryKey = 'id_producto';

    // 🔸 Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre_producto',
        'precio',
        'id_tipo',
        'stock', // si más adelante lo conectas con tipos_productos
    ];

    // 🔸 Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // 🔸 Relación con Tipo (si la agregas)
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'id_tipo');
    }
}
