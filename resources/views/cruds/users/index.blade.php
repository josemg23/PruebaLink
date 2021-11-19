@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Lista de Usuarios') }}</div>

                    <div class="card-body">
                        <a type="button" class="btn btn-primary" href="{{ route('user.create') }}"> Crear Usuario</a> <br>
                        <br>


                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nombre(s) Usuario</th>
                                    <th scope="col">Correo Electrónico</th>
                                    <th scope="col">Rol Asignado</th>
                                    <th scope="col" coldspan="2">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>

                                        <td>
                                            @isset($u->role->name)
                                                {{ $u->role->name }}
                                            @endisset
                                        </td>


                                        <td class="table-button ">
                                            <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                            <form method="POST" action="{{ route('user.destroy', $u->id) }}}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary "
                                                    href="/admin/show-user/{{ $u['id'] }}">Ver</i></a>
                                                <a class="btn btn-success"
                                                    href="/admin/edit-user/{{ $u['id'] }}">Editar</a>
                                                <button type="submit" class="btn btn-danger "> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->
                        </table>
                        <div class="row justify-content-center">
                            {!! $users->links() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
