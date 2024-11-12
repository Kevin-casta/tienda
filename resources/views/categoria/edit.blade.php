@extends('layouts.app')
@section('content')
    <h1> Editar Categoria</h1>

    <form action="{{ route('categoria.update')}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$categoria->id}}">

        <div class="mb-3">
            <label class="form-label">Nuevo Nombre</label>
            <input type="text" class="form-control" placeholder="{{$categoria->category_name}}" name="category_name" value="{{ $categoria -> category_name}}">

        </div>

        <div class="mb-3">
            <label class="form-label">Nueva Descipcion</label>
            <input type="text" class="form-control" placeholder="{{$categoria->descripcion}}" name="descripcion" value="{{ $categoria -> descripcion}}">

        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
@endsection
