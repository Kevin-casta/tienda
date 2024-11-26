@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Facturas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('factura.index') }}">Facturas</a></li>
                <li class="breadcrumb-item active">Editar Factura</li>
            </ol>
        </nav>
    </div>

    <section class="factura">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Factura</h5>

                <form action="{{ route('facturas.update') }}" class="row g-3" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $factura->id }}" />

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Factura" name="total"  value="{{ $factura->total }}">
                            <label>Total</label>
                        </div>
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
