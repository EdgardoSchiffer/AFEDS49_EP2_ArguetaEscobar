@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Bienvenido {{ Auth::user()->name }} Puedes realiza las siguientes acciones:</h3>
                    <br>
                    <br>
                    <div class="col-12">
                        <a class="btn btn-primary col-12" href="{{ route('products.create') }}">Registrar producto</a>
                    </div>
                    <br>
                    <div class="col-12">
                        <a class="btn btn-primary col-12" href="{{ route('products.index') }}">Ver tus productos</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
