@extends('layouts.app')
@section('content')

    <h1>Productos</h1>

    <a href="{{route('productos.create')}}" class="btn btn-primary">Agregar Producto</a>

    <table class="table table-bordered mt-3" >
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($producto as $productos )

            <tr>

                <td>{{$productos->ID}}</td>
                <td>{{$productos->NOMBRE}}</td>
                <td>{{$productos->DESCRIPCION}}</td>
                <td>
                    <a href="{{ route('productos.edit', $productos ->id)}}" class="btn btn-warning">EDITAR</a>
                    <form method="POST" action="{{route('productos.delete', $productos -> id)}}">
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
