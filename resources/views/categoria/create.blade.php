@extends('layouts.app')
@section('content')
    <h1> Nueva categoria</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('categoria.index')}}">Categorias</a></li>
          <li class="breadcrumb-item active">Nueva Categoria</li>
        </ol>
      </nav>

    <form action="{{ route('categoria.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Ingrese el nombre de la categoria" name="category_name">

        </div>

        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" placeholder="Ingrese descripcion de la categoria" name="descripcion">

        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
@endsection
