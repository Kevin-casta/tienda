@extends('layouts.app')
@section('content')
    <h1> Nuevo producto</h1>

    <form action="{{ route('productos.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Ingrese el nombre del producto" name="NOMBRE">

        </div>

        <div class="mb-3">
            <label class="form-label">Descipcion</label>
            <input type="text" class="form-control" placeholder="Ingrese descripcion del producto" name="DESCRIPCION">

        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
@endsection
