@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Categoria</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"> <a href="{{ route('categoria.index') }}">Categoria</a></li>
                <li class="breadcrumb-item active">Editar Categoria</li>
            </ol>
        </nav>
    </div>

    <section class="categoria">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Categoria</h5>

                <form action="{{ route('categoria.update') }}" class="row g-3" method="POST">
                    @csrf
                    @method('PUT')

                    <input hidden name="id" value="{{ $categoria->id }}" />

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese el nombre de la categoria" name="category_name" value="{{$categoria->category_name}}">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripcion</label>
                        <input type="text" class="form-control" placeholder="Ingrese descripcion de la categoria" name="descripcion" value="{{$categoria->descripcion}}">

                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection
