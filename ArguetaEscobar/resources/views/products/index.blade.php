@extends('layouts.app')
@section('jsstart')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.deletebtn').click(function(e) {
                e.preventDefault();
                var id = $(this).closest("tr").find('.delete_id').val();
                Swal.fire({
                    title: 'Esta seguro de eliminar el registro?',
                    text: "No podras revertir este cambio!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Continuar!',
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data = {
                            _token: $('input[name="_token"]').val()
                        };
                        $.ajax({
                            type: 'DELETE',
                            url: '/products/' + id,
                            data: data,
                            success: function(response) {
                                if (response.status) {
                                    $("#sid" + id).remove();

                                    Swal.fire(
                                        'Eliminado!',
                                        'Registro eliminado.',
                                        'success',

                                    )
                                }
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                Swal.fire(
                                    'Error',
                                    'No se pudo eliminar el registro. ' +
                                    textStatus + '.' + errorThrown,
                                    'warning',

                                )
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
@section('buttons')
    
        <!---<a class="btn btn-primary mr-2" href=" { { '/products/create' }}">Crear Productos</a>-->
        <a class="btn btn-primary mr-2" href="{{ route('products.create') }}">Crear Productos</a>
    
@endsection

@section('content')
    <h2 class="text-center mmb-5">Gestión de productos</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <h1>Productos</h1>
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Código</th>
                    <th scole="col">Nombre</th>
                    <th scole="col">Descripción</th>
                    <th scole="col">Precio Unitario</th>
                    <th scole="col">Existencias</th>
                    <th scole="col">Garantia</th>
                    <th scole="col">Vendedor</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <!-- id="sid { { $item->id }}" -->    
                <tr>
                        <!--<input type="hidden" class="delete_id" value="{ { $item->id }}">-->
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->unit_price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->warranty }}</td>
                        <td>{{ $item->seller_id }}</td>
                        <td>
                            <button type="button" class="btn btn-danger mr-1 deletebtn ">Eliminar</button>
                            <a href="{{ route('products.edit', ['product' => $item->id]) }}"
                                class="btn btn-warning mr-1">Editar</a>
                            <a href="{{ route('products.show', ['product' => $item->id]) }}"
                                class="btn btn-success mr-1">Mostrar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
