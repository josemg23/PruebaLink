@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Parece que hay porblemas o Malas decisiones <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Creación de Roles') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rol.store') }} ">
                            @csrf

                            <div class="form-group">
                                <label for="inputAddress">Rol</label>
                                <input type="text" class="form-control" id="rol" name="name" placeholder="Nombre del Rol">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"
                                    placeholder="Descripción del Rol">
                            </div>
                            <a type="button" class="btn btn-dark" href="{{ route('rol.index') }}"> Atras</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
