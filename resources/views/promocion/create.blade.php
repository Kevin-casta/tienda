@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Promociones</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('promocion.index') }}">Promociones</a></li>
                <li class="breadcrumb-item active">Nueva Promocion Producto</li>
            </ol>
        </nav>
    </div>

    <section class="promocion">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Nueva Promocion</h5>

                <form action="{{ route('promocions.store') }}" class="row g-3" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="id_producto">Producto</label>
                        <select name="productos_id" id="id_producto" class="form-control" required>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->NOMBRE }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="promocion" name="DESCRIPCION"  >
                            <label>Descripcion</label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('promocion.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection
