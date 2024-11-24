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

                    <div class="col-md-12">
                        <div class="form-floating">
                            <select class="form-select" aria-label="Default select example">
                                @foreach ($categorias as $categoria )
                                <option selected>Seleccione un producto</option>
                                <option value="{{$categoria->id}}">{{$categoria->category_name}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Producto" name="id_producto" >
                            <label>precio</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Producto" name="cantidad" >
                            <label>cantidad</label>
                        </div>
                    </div>

                </form>
                <form action="{{ route('facturas.store') }}" class="row g-3" method="POST">
                    @csrf

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Producto" name="total" >
                            <label>total</label>
                        </div>
                    </div>

                </form>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="#" class="btn btn-secondary">Volver</a>
                </div>

            </div>
        </div>

    </section>
@endsection
