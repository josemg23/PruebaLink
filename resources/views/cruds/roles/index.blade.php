@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Lista de Roles') }}</div>

                <div class="card-body">
                   
                    <div class="card-body">
                        <a type="button" class="btn btn-primary" href="{{route('rol.create')}}" > Crear Servicio</a>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
