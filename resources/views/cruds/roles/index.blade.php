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
                    <div class="card-header">{{ __('Lista de Roles') }}</div>

                    <div class="card-body">
                        <a type="button" class="btn btn-primary" href="{{ route('rol.create') }}"> Crear Rol</a> <br> <br>


                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nombre del Rol</th>
                                    <th scope="col">Desccripción del Rol</th>
                                    <th scope="col" coldspan="2">Acciones</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach ($roles as $r)
                                    <tr>
                                        <td>{{ $r->name }}</td>
                                        <td>{{ $r->descripcion }}</td>
                                        <td class="table-button ">
                                            <!--metodo delete funciona pero hay que almacenar la variable array en una variable temporal-->
                                            <form method="POST" action="{{ route('rol.destroy', $r->id) }}}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary " href="/admin/show-rol/{{ $r['id'] }}">Ver</i></a>
                                                <a class="btn btn-success" href="/admin/edit-rol/{{ $r['id'] }}">Editar</a>
                                                <button type="submit" class="btn btn-danger "> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->
                        </table>
                        <div class="row justify-content-center">
                            {!! $roles->links() !!}
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')


@stop