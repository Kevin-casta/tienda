@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Cliente</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('cliente.index') }}">Clientes</a></li>
                <li class="breadcrumb-item active">Editar Cliente</li>
            </ol>
        </nav>
    </div>

    <section class="categoria">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Cliente</h5>

                <form action="{{ route('cliente.update') }}" class="row g-3" method="POST">
                    @csrf
                    @method('PUT')

                    <input hidden name="id" value="{{ $cliente->id }}" />

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese el nombre del cliente" name="NOMBRE" value="{{$cliente->NOMBRE}}">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefono</label>
                        <input type="text" class="form-control" placeholder="Ingrese el telefono del cliente" name="TELEFONO" value="{{$cliente->TELEFONO}}">

                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection
