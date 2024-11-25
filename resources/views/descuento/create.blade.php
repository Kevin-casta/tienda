@extends('layouts.app')
@section('content')
    <h1> Nuevo Descuento</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('descuento.index')}}">Descuento</a></li>
          <li class="breadcrumb-item active">Nuevo Descuento</li>
        </ol>
      </nav>

    <form action="{{ route('descuento.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="">Categoria</label>
            <select name="categoria_id" id="input" class="form-control">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->category_name}}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" placeholder="Ingrese la descripcion del descuento" name="descripcion">

        </div>

        <div class="mb-3">
            <label class="form-label">Descuento</label>
            <input type="number" class="form-control" placeholder="Ingrese el descuento" name="porcentaje">

        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
@endsection
