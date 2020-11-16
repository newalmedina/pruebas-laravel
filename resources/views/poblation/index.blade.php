@extends('layout')
@section('content')
<h3>Población</h3>
<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('poblation.create')}}" class="btn btn-info">Nueva Población</a>
    </div>
    <div class="col-md-12">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($poblations as $poblation)
                <tr>
                    <th>{{$poblation->id}}</th>
                    <th>{{$poblation->description}}</th>
                    <th>
                       <form action="{{route('poblation.destroy',$poblation->id)}}" method="Post">
                        @csrf
                        <input type="hidden" value="DELETE" name="_method">
                            <a href="{{route('poblation.edit',$poblation->id)}}" class="btn btn-primary">Editar</a>

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
