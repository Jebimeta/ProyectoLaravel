@extends('home')

@section('content')
<div class="row text-center">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <br><br>
        <h3>Lista de alimentos</h3>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            Añadir
        </button>
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            @csrf
        </form>
        <button class="btn btn-success" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</button>


        <div class="table-responsive">
            <br>
            <table class="table">
                <thead class="bg-dark text-white text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">CANTIDADES</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($alimentos as $alimento)
                    <tr class="">
                        <td scope="row">{{$alimento->id}}</td>
                        <td>{{$alimento->nombre}}</td>
                        <td>{{$alimento->precio}}</td>
                        <td>{{$alimento->cantidad}}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$alimento->id}}">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$alimento->id}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    @include('alimento.info')
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('alimento.create')
    </div>
    <div class="col-md-2"></div>
</div>

@endsection