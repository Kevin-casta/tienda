@extends('layouts.app')
@section('content')
    <h1> Editar producto</h1>

    <form action="{{ route('productos.update')}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$producto->id}}">

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Ingrese el nombre del producto" name="NOMBRE" value="{{ $producto -> NOMBRE}}">

        </div>

        <div class="mb-3">
            <label class="form-label">Descipcion</label>
            <input type="text" class="form-control" placeholder="Ingrese descripcion del producto" name="DESCRIPCION" value="{{ $producto -> DESCRIPCION}}">

        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
@endsection
