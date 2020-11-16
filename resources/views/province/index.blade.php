@extends('layout')
@section('content')
<h3>Provincia</h3>
<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('province.create')}}" class="btn btn-info">Nueva Provincia</a>
    </div>
    <div class="col-md-12">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Poblacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($provinces as $province)
                <tr>
                    <th>{{$province->id}}</th>
                    <th>{{$province->description}}</th>
                    <th>{{$province->poblation->description}}</th>
                    <th>
                       <form action="{{route('province.destroy',$province->id)}}" method="Post">
                        @csrf
                        <input type="hidden" value="DELETE" name="_method">
                            <a href="{{route('province.edit',$province->id)}}" class="btn btn-primary">Editar</a>

                            <button type="submit"  class="btn btn-danger">Eliminar</button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
