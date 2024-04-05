@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card mb-3 mt-3">
                    <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}" style="width: 100%;">
                    <div class="card-body text-center">
                        <h1 class="card-title">{{ $producto->nombre }}</h1>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: ${{ number_format($producto->precio, 0, ',', '.') }}</p>
                        <!-- Aquí podrías agregar un formulario para agregar el producto al carrito -->
                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            // Mostrar alerta con fade
            $("#success-alert").fadeIn();

            // Ocultar la alerta después de 2 segundos con fade
            setTimeout(function() {
                $("#success-alert").fadeOut();
            }, 2500);
        });
    </script>
@endsection
