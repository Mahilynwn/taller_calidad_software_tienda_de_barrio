<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    // ✅ Constante para evitar duplicación de mensajes
    private const MSG_TIPO_NO_ENCONTRADO = 'Tipo no encontrado.';

    // Mostrar todos los tipos de productos
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }

    // Formulario de creación
    public function create()
    {
        return view('tipos.create');
    }

    // Guardar nuevo tipo en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:191',
            'descripcion' => 'nullable|string|max:255',
        ]);

        Tipo::create([
            'nombre_tipo' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('tipos.index')->with('success', 'Tipo creado correctamente.');
    }

    // Formulario de edición
    public function edit($id)
    {
        $tipo = Tipo::find($id);

        if (!$tipo) {
            return redirect()->route('tipos.index')->with('error', self::MSG_TIPO_NO_ENCONTRADO);
        }

        return view('tipos.edit', compact('tipo'));
    }

    // Actualizar tipo
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:191',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $tipo = Tipo::find($id);

        if (!$tipo) {
            return redirect()->route('tipos.index')->with('error', self::MSG_TIPO_NO_ENCONTRADO);
        }

        $tipo->update([
            'nombre_tipo' => $request->nombre,
            'descripcion'  => $request->descripcion,
        ]);

        return redirect()->route('tipos.index')->with('success', 'Tipo actualizado correctamente.');
    }

    // Eliminar tipo
    public function destroy($id)
    {
        $tipo = Tipo::find($id);

        if (!$tipo) {
            return redirect()->route('tipos.index')->with('error', self::MSG_TIPO_NO_ENCONTRADO);
        }

        $tipo->delete();

        return redirect()->route('tipos.index')->with('success', 'Tipo eliminado correctamente.');
    }
}
