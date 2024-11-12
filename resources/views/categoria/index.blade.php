@extends('layouts.app')
@section('content')

    <h1>Categorias</h1>

    <a href="{{route('categoria.create')}}" class="btn btn-primary">Agregar categoria</a>

    <table class="table table-bordered mt-3" >
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($categoria as $categoria )

            <tr>

                <td>{{$categoria->id}}</td>
                <td>{{$categoria->category_name}}</td>
                <td>{{$categoria->descripcion}}</td>
                <td>
                        <a href="{{ route('categoria.edit', $categoria ->id)}}" class="btn btn-warning">EDITAR</a>
                </td>
                <td>
                    <form method="POST" action="{{route('categoria.delete', $categoria -> id)}}">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger btnDelete">Eliminar</button>

                    </form>
                </td>

            @endforeach
            </tr>
        </tbody>

    </table>


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
