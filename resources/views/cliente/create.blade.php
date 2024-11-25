@extends('layouts.app')
@section('content')
    <h1> Nuevo Cliente</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('cliente.index')}}">Clientes</a></li>
          <li class="breadcrumb-item active">Nuevo Cliente</li>
        </ol>
      </nav>

    <form action="{{ route('cliente.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Ingrese el nombre del cliente" name="NOMBRE">

        </div>

        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" placeholder="Ingrese el numero de telefono del cliente" name="TELEFONO">

        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
@endsection
