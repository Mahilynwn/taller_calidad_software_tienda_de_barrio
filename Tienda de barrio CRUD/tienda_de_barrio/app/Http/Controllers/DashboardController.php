<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    // 🟢 DASHBOARD PRINCIPAL
    public function index()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        return view('dashboard');
    }

    // 🟣 LISTAR PRODUCTOS
    public function productos()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        $path = storage_path('app/public/productos.json');
        $productos = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

        return view('productos', ['productos' => $productos]);
    }

    // 🟡 CREAR PRODUCTO (VISTA)
    public function crearProducto()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        $tiposPath = storage_path('app/public/tipos.json');
        $tipos = file_exists($tiposPath) ? json_decode(file_get_contents($tiposPath), true) : [];

        return view('crearProducto', ['tipos' => $tipos]);
    }

    // 🟢 GUARDAR NUEVO PRODUCTO
    public function storeProducto(Request $request)
    {
        $path = storage_path('app/public/productos.json');
        $productos = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

        $nuevo = [
            'id' => count($productos) + 1,
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'tipo' => $request->input('tipo'),
            'stock' => $request->input('stock')
        ];

        $productos[] = $nuevo;
        file_put_contents($path, json_encode($productos, JSON_PRETTY_PRINT));

        return redirect()->route('productos')->with('success', 'Producto creado correctamente.');
    }

    // 🟠 EDITAR PRODUCTO (VISTA)
    public function editProducto($id)
    {
        $path = storage_path('app/public/productos.json');
        $productos = json_decode(file_get_contents($path), true);
        $producto = collect($productos)->firstWhere('id', $id);

        $tiposPath = storage_path('app/public/tipos.json');
        $tipos = file_exists($tiposPath) ? json_decode(file_get_contents($tiposPath), true) : [];

        return view('editarProducto', ['producto' => $producto, 'tipos' => $tipos]);
    }

    // 🔵 ACTUALIZAR PRODUCTO
    public function updateProducto(Request $request, $id)
    {
        $path = storage_path('app/public/productos.json');
        $productos = json_decode(file_get_contents($path), true);

        foreach ($productos as &$producto) {
            if ($producto['id'] == $id) {
                $producto['nombre'] = $request->input('nombre');
                $producto['precio'] = $request->input('precio');
                $producto['tipo'] = $request->input('tipo');
                $producto['stock'] = $request->input('stock');
                break;
            }
        }

        file_put_contents($path, json_encode($productos, JSON_PRETTY_PRINT));
        return redirect()->route('productos')->with('success', 'Producto actualizado correctamente.');
    }

    // 🔴 ELIMINAR PRODUCTO
    public function deleteProducto($id)
    {
        $path = storage_path('app/public/productos.json');
        $productos = json_decode(file_get_contents($path), true);

        $productos = array_filter($productos, fn($p) => $p['id'] != $id);
        file_put_contents($path, json_encode(array_values($productos), JSON_PRETTY_PRINT));

        return redirect()->route('productos')->with('success', 'Producto eliminado correctamente.');
    }

    // 🟣 LISTAR TIPOS
    public function tipos()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        $path = storage_path('app/public/tipos.json');
        $tipos = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

        return view('tipos', ['tipos' => $tipos]);
    }

    // 🟡 CREAR TIPO (VISTA)
    public function crearTipo()
    {
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        return view('crearTipo');
    }

    // 🟢 GUARDAR NUEVO TIPO
    public function storeTipo(Request $request)
    {
        $path = storage_path('app/public/tipos.json');
        $tipos = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

        $nuevo = [
            'id' => count($tipos) + 1,
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ];

        $tipos[] = $nuevo;
        file_put_contents($path, json_encode($tipos, JSON_PRETTY_PRINT));

        return redirect()->route('tipos')->with('success', 'Tipo creado correctamente.');
    }

    // 🟠 EDITAR TIPO (VISTA)
    public function editTipo($id)
    {
        $path = storage_path('app/public/tipos.json');
        $tipos = json_decode(file_get_contents($path), true);
        $tipo = collect($tipos)->firstWhere('id', $id);

        return view('editarTipo', ['tipo' => $tipo]);
    }

    // 🔵 ACTUALIZAR TIPO
    public function updateTipo(Request $request, $id)
    {
        $path = storage_path('app/public/tipos.json');
        $tipos = json_decode(file_get_contents($path), true);

        foreach ($tipos as &$tipo) {
            if ($tipo['id'] == $id) {
                $tipo['nombre'] = $request->input('nombre');
                $tipo['descripcion'] = $request->input('descripcion');
                break;
            }
        }

        file_put_contents($path, json_encode($tipos, JSON_PRETTY_PRINT));
        return redirect()->route('tipos')->with('success', 'Tipo actualizado correctamente.');
    }

    // 🔴 ELIMINAR TIPO
    public function deleteTipo($id)
    {
        $path = storage_path('app/public/tipos.json');
        $tipos = json_decode(file_get_contents($path), true);

        $tipos = array_filter($tipos, fn($t) => $t['id'] != $id);
        file_put_contents($path, json_encode(array_values($tipos), JSON_PRETTY_PRINT));

        return redirect()->route('tipos')->with('success', 'Tipo eliminado correctamente.');
    }

    // 🚪 CERRAR SESIÓN
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}
