<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        // Obtener todos los productos
        $productos = Producto::all();
        
        // Devolver vista con los productos
        return view('productos.index', compact('productos'));
    }

    public function show($id)
    {
        // Obtener el producto por su ID
        $producto = Producto::findOrFail($id);

        // Devolver vista con los detalles del producto
        return view('productos.show', compact('producto'));
    }

}
