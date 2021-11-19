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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Creación de Usuarios') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }} ">
                            @csrf

                            <div class="form-group">
                                <label for="inputAddress">Nombres</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombres">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Correo Electrónico">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputState">Seleccione el Rol</label>
                                <select id="role"  name="role" class="form-control">
                                    <option selected disabled>Elija el Rol...</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">
                                            {{ $rol->name }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <a type="button" class="btn btn-dark" href="{{ route('user.index') }}"> Atras</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
