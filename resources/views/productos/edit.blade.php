@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Productos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('productos.index') }}">Productos</a>/li>
                <li class="breadcrumb-item active">Editar Producto</li>
            </ol>
        </nav>
    </div>

    <section class="producto">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Producto</h5>

                <form action="{{ route('productos.update') }}" class="row g-3" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $producto->id }}" />

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Producto" name="NOMBRE"  value="{{ $producto->NOMBRE }}" >
                            <label>Nombre</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Producto" name="TIPO"  value="{{ $producto->TIPO }}">
                            <label>Tipo</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Producto" name="DESCRIPCION" value="{{ $producto->DESCRIPCION }}" >
                            <label>Descripcion</label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection
