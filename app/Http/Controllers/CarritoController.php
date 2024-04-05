<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Producto;
use App\Models\Carrito;

class CarritoController extends Controller
{
    public function index()
    {
        // Obtener el contenido del carrito
        $carrito = session()->get('carrito', []);

        // Devolver vista con el contenido del carrito
        return view('carrito.index', ['carrito' => $carrito]);
    }

    public function agregar(Request $request, $id)
    {
        // Obtener el producto a agregar al carrito
        $producto = Producto::findOrFail($id);
        
        // Obtener el contenido actual del carrito de la sesión
        $carrito = session()->get('carrito', []);
        
        // Generar un identificador único para este producto en el carrito
        $identificador = $producto->id . '-' . $producto->nombre; // Puedes usar otros atributos si lo deseas
        
        // Verificar si el producto ya está en el carrito
        if (isset($carrito[$identificador])) {
            // Si el producto ya está en el carrito, aumenta la cantidad en 1
            $carrito[$identificador]['cantidad']++;
        } else {
            // Si el producto no está en el carrito, agrega un nuevo elemento al carrito
            $carrito[$identificador] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1, // Inicialmente, la cantidad es 1
            ];
        }
    
        // Guardar el contenido actualizado del carrito en la sesión
        session()->put('carrito', $carrito);
    
        // Obtener la cantidad específica de este producto en el carrito
        $cantidadEnCarrito = $carrito[$identificador]['cantidad'];
    
        // Redirigir de vuelta a la página anterior con un mensaje de éxito y la cantidad en el carrito
        return redirect()->back()->with('success', "Producto agregado al carrito exitosamente. Cantidad en el carrito: $cantidadEnCarrito");
    }
    

    public function eliminar($id)
    {
        // Obtener el contenido actual del carrito de la sesión
        $carrito = session()->get('carrito', []);

        // Verificar si el producto con el ID dado está en el carrito
        foreach ($carrito as $identificador => $item) {
            if ($item['id'] == $id) {
                // Si el producto está en el carrito, disminuir la cantidad en 1
                $carrito[$identificador]['cantidad']--;
                
                // Si la cantidad es 0, eliminar completamente el ítem del carrito
                if ($carrito[$identificador]['cantidad'] <= 0) {
                    unset($carrito[$identificador]);
                }

                // Guardar el carrito actualizado en la sesión
                session()->put('carrito', $carrito);
                // Redirigir de vuelta a la página del carrito con un mensaje de éxito
                return redirect()->route('carrito.index')->with('success', 'Se ha disminuido la cantidad del producto en el carrito');
            }
        }

        // Si el producto no se encuentra en el carrito, redirigir de vuelta con un mensaje de error
        return redirect()->route('carrito.index')->with('error', 'El producto que intentas disminuir no está en el carrito');
    }

    public function resumen()
    {
        // Obtener el contenido del carrito
        $carrito = session()->get('carrito', []);

        // Calcular el total a pagar
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        // Devolver la vista del resumen de la orden con los detalles de los productos y el total a pagar
        return view('carrito.resumen', compact('carrito', 'total'));
    }

    public function comprar(Request $request)
    {
        // Procesar la compra (simulada)

        // Limpiar el carrito
        session()->forget('carrito');

        // Redirigir al usuario a la página de inicio con un mensaje de éxito
        return redirect('/')->with('success', 'Compra realizada con éxito. ¡Gracias por su compra!');
    }


    public function limpiar()
    {
        $carrito = session()->get('carrito', []);
    
        // Disminuir la cantidad de todos los ítems a 0
        foreach ($carrito as &$item) {
            $item['cantidad'] = 0;
        }
    
        // Eliminar el carrito de la sesión
        session()->forget('carrito');
    
        return redirect()->route('carrito.index')->with('success', 'El carrito se ha limpiado correctamente.');
    }
    

}
