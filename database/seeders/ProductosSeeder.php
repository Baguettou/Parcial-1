<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Producto;


class ProductosSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Fresas con chocolate',
            'imagen' => 'imgs/fresas.png',
            'descripcion' => 'Deliciosas fresas con chocolate de la UNAB',
            'precio' => 10000,
        ]);

        Producto::create([
            'nombre' => 'Gomitas enchiladas',
            'imagen' => 'imgs/gomitas.png',
            'descripcion' => 'Deliciosas gomitas enchiladas de la UNAB',
            'precio' => 12000,
        ]);

    }
}
