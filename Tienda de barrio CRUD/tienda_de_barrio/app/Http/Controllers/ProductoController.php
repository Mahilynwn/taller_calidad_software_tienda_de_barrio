<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Tipo;

class ProductoController extends Controller
{
    // 📋 Mostrar todos los productos con filtros opcionales
    public function index(Request $request)
    {
        $query = Producto::with('tipo');

        // 🔍 Filtros opcionales
        if ($request->filled('nombre')) {
            $query->where('nombre_producto', 'LIKE', '%' . $request->nombre . '%');
        }

        if ($request->filled('id_tipo')) {
            $query->where('id_tipo', $request->id_tipo);
        }

        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }

        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        $productos = $query->get();
        $tipos = \DB::table('tipos_productos')->get();

        // ⚠️ Si no hay resultados, enviamos una variable de advertencia
        $mensaje = null;
        if ($productos->isEmpty()) {
            $mensaje = 'No hay productos por mostrar.';
        }

        return view('productos.index', compact('productos', 'tipos', 'mensaje'));
    }

    // 🆕 Crear producto
    public function create()
    {
        $tipos = \DB::table('tipos_productos')->get();
        return view('productos.create', compact('tipos'));
    }

    // 💾 Guardar producto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'id_tipo' => 'required|integer|exists:tipos_productos,id_tipo',
            'stock' => 'nullable|integer',
        ]);

        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto registrado correctamente.');
    }

    // ✏️ Editar producto
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $tipos = \DB::table('tipos_productos')->get();
        return view('productos.edit', compact('producto', 'tipos'));
    }

    // 💾 Actualizar producto
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_tipo' => 'required|integer|exists:tipos_productos,id_tipo',
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

    // 🗑️ Eliminar producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
