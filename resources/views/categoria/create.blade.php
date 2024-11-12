@extends('layouts.app')
@section('content')
    <h1> Nueva categoria</h1>

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
