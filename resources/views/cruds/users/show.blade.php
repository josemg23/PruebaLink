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
                    <div class="card-header">{{ __('Vista de Usuarios') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }} ">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="inputAddress">Nombres</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                                    placeholder="Nombres" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="Correo Electrónico" disabled>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="inputState">Seleccione el Rol</label>
                                <select id="role" name="role" class="form-control" disabled>
                                    @foreach ($roluser as $ruser)
                                        <option selected disabled value="{{ $ruser->id }}">{{ $ruser->name }}
                                        </option>
                                    @endforeach
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">
                                            {{ $rol->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <a type="button" class="btn btn-dark" href="{{ route('user.index') }}"> Atras</a>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
