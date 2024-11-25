@extends('layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Promocion</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Promocion</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="car-header py-3">
            <div class="row">
                <div class="m-0 font-weight-bold text-primary col-md-11">
                    Promocion
                </div>
                <div class="col-md-1">
                    <a href="{{ route('promocions.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('promocion.index')}}" class="navbar-search" method="GET">

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
                    <div class="col-md-10">
                        <div class="input-group-mb-3">
                            <input type="text"
                                    class="form-control bg-light border-0 small"
                                    placeholder="Buscar..."
                                    aria-label="search"
                                    name="filter"
                                    value="{{ $data -> filter}}">

                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="input group-append"> 
                            <button class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Fecha Ini</th>
                    <th>Fecha Fin</th>
                    <th>Descripcion</th>
                    <th>Productos_id</th>
                </thead>

                <tbody>
                    @foreach ($promocions as $promocion  )
                    <tr>
                        <td>{{ $promocion -> id}}</td>
                        <td>{{ $promocion -> created_at}}</td>
                        <td>{{ $promocion -> updated_at}}</td>
                        <td>{{ $promocion -> descripcion}}</td>
                        <td>{{ $promocion -> productos_id}}</td>


                        <td>
                            <a href="{{ route('promocions.edit', $promocion->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-fill"></i>
                            </a>

                            <form action="{{ route('promocions.delete', $promocion->id) }}" style="display:contents"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btnDelete"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

            {{ $promocions->appends(request()->except('page'))->links('components.customPagination') }}
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
                title: "Desea eliminar esta promocion?",
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
