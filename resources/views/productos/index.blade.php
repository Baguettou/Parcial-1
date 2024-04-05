@extends('layouts.app')

@section('content')

    <!-- Alerta de compra realizada con éxito -->
    @if (session('success'))
        <div id="success-alert" class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            $(document).ready(function(){
                // Mostrar alerta con fade
                $("#success-alert").fadeIn();

                // Ocultar la alerta después de 4 segundos con fade
                setTimeout(function() {
                    $("#success-alert").fadeOut();
                }, 4000);
            });
        </script>
    @endif

    <h1 class="mt-2">Productos Disponibles</h1>
    <div class="row">
        @foreach ($productos as $producto)
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: ${{ number_format($producto->precio, 0, ',', '.') }}</p>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
