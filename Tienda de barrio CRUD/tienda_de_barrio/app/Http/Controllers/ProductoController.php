<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Tipo;

class ProductoController extends Controller
{
    // 📋 Mostrar todos los productos junto con su tipo
    public function index()
    {
        // Eager Loading del tipo para evitar consultas repetidas
        $productos = Producto::with('tipo')->get();
        return view('productos.index', compact('productos'));
    }

    // 🆕 Mostrar formulario para crear un producto
    public function create()
    {
        $tipos = \DB::table('tipos_productos')->get(); // ✅ usar la tabla correcta
        return view('productos.create', compact('tipos'));
    }

    // 💾 Guardar un nuevo producto en la BD
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'id_tipo' => 'required|integer|exists:tipos_productos,id_tipo', // ✅ cambio aquí
            'stock' => 'nullable|integer',
        ]);

        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto registrado correctamente.');
    }

    // ✏️ Mostrar formulario de edición de un producto
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $tipos = \DB::table('tipos_productos')->get(); // ✅ cambio aquí
        return view('productos.edit', compact('producto', 'tipos'));
    }

    // 💾 Actualizar producto
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_tipo' => 'required|integer|exists:tipos_productos,id_tipo', // ✅ cambio aquí
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update([
            'nombre_producto' => $request->nombre_producto,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'id_tipo' => $request->id_tipo,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    // 🗑️ Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
