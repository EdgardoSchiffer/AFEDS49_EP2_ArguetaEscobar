@extends('layouts.app')

@section('buttons')
    <!---<a class="btn btn-primary mr-2" href=" { { '/products/create' }}">Crear Productos</a>-->
    <a class="btn btn-primary mr-2" href="{{ route('products.index') }}">Regresar</a>
@endsection

@section('content')
    <h2 class="text-center mmb-5">Crear nuevo producto</h2>
    <div class="row justify-content-center">
        <h1>Productos</h1>

        <form method="POST" action="{{ route('products.store') }}">

            <!-- show data sent in url { {$suppliers}}-->
            @csrf

            <div class="row mb-3">
                <label for="product_name">Nombre Producto</label>
                <div class="col-md-6">
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
                        id="product_name" value="{{ old('product_name') }}">
                </div>
                @error('product_name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="description">Descripción</label>
                <div class="col-md-6">
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                        id="description" value="{{ old('description') }}">
                </div>
                @error('description')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="unit_price">Precio unitario</label>
                <div class="col-md-6">
                    <input type="text" name="unit_price" class="form-control @error('unit_price') is-invalid @enderror" id="unit_price"
                        placeholder="Precio" value="{{ old('unit_price') }}">
                </div>
                @error('unit_price')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="stock">Existencias</label>
                <div class="col-md-6">
                    <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror"
                        id="stock" placeholder="Existencias" value="{{ old('stock') }}">
                </div>
                @error('stock')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="warranty">Garantia</label>
                <div class="col-md-6">
                    <input type="text" name="warranty" class="form-control @error('warranty') is-invalid @enderror"
                        id="warranty" placeholder="Garantia" value="{{ old('warranty') }}">
                </div>
                @error('warranty')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" value="Agregar Producto">Agregar Producto</button>
            </div>
        </form>
    </div>
@endsection
