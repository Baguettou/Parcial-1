@extends('layouts.app')

@section('content')
    <h1 class="mt-2">Carrito de Compras</h1>
    @if (count($carrito) > 0)
        <div class="row">
            @foreach ($carrito as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['nombre'] }}</h5>
                            <p class="card-text">Precio: ${{ number_format($item['precio'], 0, ',', '.') }}</p>
                            <p class="card-text">Cantidad: {{ $item['cantidad'] }}</p>
                            <!-- Otros detalles del producto en el carrito -->
                            <form action="{{ route('carrito.eliminar', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Botón para limpiar el carrito -->
        <div class="text-center">
            <form action="{{ route('carrito.limpiar') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Limpiar Carrito</button>
            </form>
            <!-- Botón para generar el resumen de la orden -->
            <a href="{{ route('carrito.resumen') }}" class="btn btn-primary mt-2">Generar Resumen de la Orden</a>
        </div>
    @else
        <p>No hay ningún ítem en el carrito.</p>
    @endif
@endsection
