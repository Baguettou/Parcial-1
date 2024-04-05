@extends('layouts.app')

@section('content')
    <h1>Resumen de la Orden</h1>
    @if (count($carrito) > 0)
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrito as $item)
                            <tr>
                                <td>{{ $item['nombre'] }}</td>
                                <td>${{ number_format($item['precio'], 0, ',', '.') }}</td>
                                <td>{{ $item['cantidad'] }}</td>
                                <td>${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4>Total a Pagar: ${{ number_format($total, 0, ',', '.') }}</h4>
            </div>
        </div>
        <hr/>
        <div class="row mt-4">
            <div class="col-md-8">
                <h2>Pago</h2>
                <form action="{{ route('comprar') }}" method="POST">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="tarjeta">Número de Tarjeta:</label>
                        <input type="text" id="tarjeta" name="tarjeta" class="form-control" placeholder="Ingrese el número de su tarjeta">
                    </div>
                    <div class="form-group mt-3">
                        <label for="expiracion">Fecha de Expiración:</label>
                        <div class="input-group">
                            <select class="custom-select" id="mes" name="mes">
                                <option selected disabled>Mes</option>
                                <option value="01">01 - Enero</option>
                                <option value="02">02 - Febrero</option>
                                <option value="03">03 - Marzo</option>
                                <option value="04">04 - Abril</option>
                                <option value="05">05 - Mayo</option>
                                <option value="06">06 - Junio</option>
                                <option value="07">07 - Julio</option>
                                <option value="08">08 - Agosto</option>
                                <option value="09">09 - Septiembre</option>
                                <option value="10">10 - Octubre</option>
                                <option value="11">11 - Noviembre</option>
                                <option value="12">12 - Diciembre</option>
                            </select>
                            <select class="custom-select" id="anio" name="anio">
                                <option selected disabled>Año</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="cvv">CVV:</label>
                        <input type="text" id="cvv" name="cvv" class="form-control" placeholder="CVV">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Pagar</button>
                </form>
            </div>
        </div>
    @else
        <p>No hay ningún ítem en el carrito.</p>
    @endif
@endsection
