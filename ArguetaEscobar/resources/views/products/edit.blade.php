@extends('layouts.app')
<style>

</style>
@section('jsstart')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!--<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#editform').submit(function(e) {
                e.preventDefault();
                swal({
                        title: 'Modificar',
                        text: "¿Esta seguro de modificar el registro?",
                        icon: 'warning',
                        //buttons: ["Cancelar","Continuar"]
                        buttons: {
                            cancel: "Cancelar",
                            confirm: "Confirmar",
                        },
                        infoMode: true,
                        closeOnClickOutside: false,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            this.submit();
                        }
                    });
            });
        });
    </script>
@endsection

@section('buttons')
    <a class="btn btn-primary mr-2" href="{{ route('products.index') }}">Regresar</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Editar producto</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="editform" action="{{ route('products.update', ['product' => $product->id]) }}" novalidate>
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="product_name">Nombre Producto</label>
                    <div class="col-md-6">
                        <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
                            id="product_name" placeholder="Nombre del Producto" value="{{ $product->product_name }}" />
                        @error('product_name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description">Descripcion</label>
                    <div class="col-md-6">
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                            id="description" placeholder="Descripcion" value="{{ $product->product_name }}" />
                        @error('description')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="unit_price">Precio Unitario</label>
                    <div class="col-md-6">
                        <input type="text" name="unit_price" class="form-control @error('unit_price') is-invalid @enderror" id="unit_price"
                            placeholder="Precio del Producto" value="{{ $product->price }}" />
                        @error('unit_price')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stock">Existencias</label>
                    <div class="col-md-6">
                        <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror"
                            id="stock" placeholder="Existencias" value="{{ $product->stock }}" />
                        @error('stock')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="warranty">Garantia</label>
                    <div class="col-md-6">
                        <input type="text" name="warranty" class="form-control @error('warranty') is-invalid @enderror"
                            id="warranty" placeholder="Garantia" value="{{ $product->warranty }}" />
                        @error('warranty')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Modificar Producto" />
                </div>
            </form>
        </div>
    </div>
@endsection
