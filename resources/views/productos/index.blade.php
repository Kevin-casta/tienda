@extends('layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Productos</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Productos</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="car-header py-3">
            <div class="row">
                <div class="m-0 font-weight-bold text-primary col-md-11">
                    Productos
                </div>
                <div class="col-md-1">
                    <a href="" class="btn btn-primary"><i class="bi bi-plus-circle"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('productos.index')}}" class="navbar-search" method="GET">

                <div class="row mt-3">
                    <div class="col-md-auto">
                        <select name="records_per_page" class="form-select bg-light border-0 small" value="{{$data ->records_per_page}}">
                            <option value="2"{{ $data -> records_per_page == 10 ? 'selected' : ''}}>2</option>
                            <option value="10"{{ $data -> records_per_page == 10 ? 'selected' : ''}}>10</option>
                            <option value="15"{{ $data -> records_per_page == 15 ? 'selected' : ''}}>15</option>
                            <option value="30"{{ $data -> records_per_page == 30 ? 'selected' : ''}}>30</option>
                            <option value="50"{{ $data -> records_per_page == 50 ? 'selected' : ''}}>50</option>

                        </select>
                    </div>
                    <div class="col-md-11">
                        <div class="input-group-mb-3">
                            <input type="text"
                                    class="form-control bg-light border-0 small"
                                    placeholder="Buscar..."
                                    aria-label="search"
                                    name="filter"
                                    value="{{ $data -> filter}}">
                            <div class="input group-append">
                                <button class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                </thead>

                <tbody>
                    @foreach ($productos as $producto  )
                    <tr>
                        <td>{{ $producto -> id}}</td>
                        <td>{{ $producto -> NOMBRE}}</td>
                        <td>{{ $producto -> TIPO}}</td>
                        <td>{{ $producto -> STOCK}}</td>
                        <td>{{ $producto -> DESCRIPCION}}</td>


                        <td>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            {{ $productos->appends(request()->except('page'))->links() }}
        </div>

    </div>
  </section>


@endsection

<script type="module">
    $(document).ready(function() {

        $('.btnDelete').click(function(event) {

            event.preventDefault();

            const form=$(this).closest('form');
            Swal.fire({
                title: "Desea eliminar este autor?",
                text: "No podra recuperarlo!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {

                    form.submit();
                }
            });




        })

    })
</script>
