<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    public function agregarProducto($producto)
    {
        // Lógica para agregar un producto al carrito
    }
}
