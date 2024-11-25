@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Promocion</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('productos.index') }}">Promocion</a></li>
                <li class="breadcrumb-item active">Editar Promocion</li>
            </ol>
        </nav>
    </div>

    <section class="promocion">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Producto</h5>

                <form action="{{ route('promocions.update') }}" class="row g-3" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $promocion->id }}" />
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Producto" name="DESCRIPCION" value="{{ $promocion->descripcion }}" >
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
