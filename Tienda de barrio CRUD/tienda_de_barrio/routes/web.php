<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoController;

/*
|--------------------------------------------------------------------------
| Rutas de la aplicación
|--------------------------------------------------------------------------
*/

// =============================================
// 🔹 LOGIN Y AUTENTICACIÓN
// =============================================

// Página principal (Login)
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

// Procesar login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Cerrar sesión
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// =============================================
// 🔹 DASHBOARD PRINCIPAL
// =============================================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('web')
    ->name('dashboard');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{id_producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id_producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id_producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
// =============================================
// 🔹 CRUD DE TIPOS DE PRODUCTOS
// =============================================

// Listar tipos
Route::get('/tipos', [TipoController::class, 'index'])->name('tipos.index');

// Crear nuevo tipo
Route::get('/tipos/crear', [TipoController::class, 'create'])->name('tipos.create');

// Guardar nuevo tipo
Route::post('/tipos', [TipoController::class, 'store'])->name('tipos.store');

// Editar tipo
Route::get('/tipos/{id}/editar', [TipoController::class, 'edit'])->name('tipos.edit');

// Actualizar tipo (PUT)
Route::put('/tipos/{id}', [TipoController::class, 'update'])->name('tipos.update');

// Eliminar tipo
Route::delete('/tipos/{id}', [TipoController::class, 'destroy'])->name('tipos.destroy');
Route::get('tipos/reporte/pdf', [TipoController::class, 'generarPDF'])->name('tipos.reporte.pdf');
Route::get('tipos/reporte/excel', [TipoController::class, 'generarExcel'])->name('tipos.reporte.excel');
