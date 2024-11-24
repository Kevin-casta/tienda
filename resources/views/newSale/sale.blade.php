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
                                @foreach ($categorias as $categoria )
                                <option value="{{$categoria->id}}">{{$categoria->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Producto" name="precio_unit" >
                            <label>precio</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Producto" name="cantidad" >
                            <label>cantidad</label>
                        </div>
                    </div>

                    <!-- Clientes -->
                    <div class="col-md-12">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Default select example" name="clientes_id">
                                <option selected>Seleccione un cliente</option>
                                <option value="0">NO REGISTRA</option>
                                @foreach ($clientes as $cliente )
                                <option value="{{$cliente->id}}">{{$cliente->NOMBRE}}</option>
                                @endforeach
                            </select>
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
@endsection
