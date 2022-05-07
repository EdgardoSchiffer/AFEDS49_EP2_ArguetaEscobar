@extends('layouts.app')

@section('buttons')
    <!---<a class="btn btn-primary mr-2" href=" { { '/products/create' }}">Crear Productos</a>-->
    <a class="btn btn-primary mr-2" href="{{ route('products.index') }}">Regresar</a>
@endsection

@section('content')

<article class="contenido-producto">
    <h1 class="text-center mb-4">{{$product->product_name}}</h1>
    <div class="product-meta">
        <p>
            <span class="font-weight-bold text-primary">Descripción</span>
            {{$product->description}}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Precio Unitario</span>
            {{$product->unit_price}}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Existencias</span>
            {{$product->stock}}
        </p>
        <p>
            <span class="font-weight-bold text-primary">Garantia</span>
            {{$product->warranty}}
        </p>
    </div>

</article>

@endsection