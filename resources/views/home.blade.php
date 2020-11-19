@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-3 text-center bg-white pt-4"><h3>{{ __('Dashboard') }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-center">{{ __('¡Estas logeado BRO!') }}</p>

                    @if(Auth::user()->role == 'user')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form onsubmit="disable()" method="POST" enctype="multipart/form-data" >
                                        <h4>Ingresa un código para consultar</h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="codee" name="code" placeholder="Ingresa tu código">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
