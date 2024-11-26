@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Nueva Venta</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Nueva Venta</li>
        </ol>
    </nav>
</div>

<section class="venta">

    <div class="card">

        <div class="card-body">

            <h5 class="card-title">Nueva Venta</h5>

            <form action="{{ route('det_facturas.store') }}" class="row g-3" method="POST">
                @csrf

                <!-- Productos -->
                <div class="col-md-12">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Default select example" name="productos_id">
                            <option selected>Seleccione un producto</option>
                            @foreach ($productos as $producto )
                            <option value="{{$producto->id}}">{{$producto->NOMBRE}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="number" class="form-control" placeholder="Precio Unitario" name="precio_unit" id="precio_unit">
                        <label>Precio Unitario</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="number" class="form-control" placeholder="Cantidad" name="cantidad" id="cantidad">
                        <label>Cantidad</label>
                    </div>
                </div>

                <!-- Clientes -->
                <div class="col-md-12">
                    <div class="form-floating">
                        <select class="form-select" aria-label="Default select example" name="clientes_id">
                            <option selected>Seleccione un cliente</option>
                            <option value="">NO REGISTRA</option>
                            @foreach ($clientes as $cliente )
                            <option value="{{$cliente->id}}">{{$cliente->NOMBRE}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Total -->
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="Total" name="total" id="total" readonly>
                        <label>Total</label>
                    </div>
                </div>

                <!-- Botones -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('facturas.create')}}" class="btn btn-secondary">Volver</a>
                </div>
            </form>

        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const precioUnitInput = document.getElementById('precio_unit');
        const cantidadInput = document.getElementById('cantidad');
        const totalInput = document.getElementById('total');

        function calcularTotal() {
            const precioUnit = parseFloat(precioUnitInput.value) || 0;
            const cantidad = parseInt(cantidadInput.value) || 0;
            const total = precioUnit * cantidad;
            totalInput.value = total.toFixed(2); // Mostrar con dos decimales
        }

        precioUnitInput.addEventListener('input', calcularTotal);
        cantidadInput.addEventListener('input', calcularTotal);
    });
</script>
@endsection
