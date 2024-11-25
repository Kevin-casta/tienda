@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Descuento</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"> <a href="{{ route("descuento.index") }}">Descuento</a></li>
                <li class="breadcrumb-item active">Editar Descuento</li>
            </ol>
        </nav>
    </div>

    <section class="categoria">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Descuento</h5>

                <form action="{{ route('descuento.update') }}" class="row g-3" method="POST">
                    @csrf
                    @method('PUT')

                    <input hidden name="id" value="{{ $descuento->id }}" />

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
                        <input type="text" class="form-control" placeholder="Ingrese la descripcion del descuento" name="descripcion" value="{{$descuento->descripcion}}">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descuento</label>
                        <input type="number" class="form-control" placeholder="Ingrese el descuento" name="porcentaje" value="{{$descuento->porcentaje}}">

                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('descuento.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection
