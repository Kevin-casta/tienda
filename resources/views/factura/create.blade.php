@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Facturas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('factura.index') }}">Facturas</a></li>
                <li class="breadcrumb-item active">Nueva Factura</li>
            </ol>
        </nav>
    </div>

    <section class="factura">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Nueva Factura</h5>

                <form action="{{ route('facturas.store') }}" class="row g-3" method="POST">
                    @csrf

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Factura" name="total"  >
                            <label>Total</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id">Cliente</label>
                        <select name="clientes_id" id="id" class="form-control" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->NOMBRE }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('factura.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection
