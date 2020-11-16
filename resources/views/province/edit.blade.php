@extends('layout')
@section('content')
<h3>Editar Provincia</h3>
<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('province.index')}}" class="btn btn-warning">Regresar</a>
    </div>
    <div class="col-md-12">
       <div class="card">
           <div class="card-body ">

              <form action="{{route('province.update',$province->id)}}" method="POST">
                @csrf
                <input type="hidden" value="PATCH" name="_method">

                <div class="form-group">
                  <label for="description">Descripción</label>
                  <input type="text" class="form-control" value="{{$province->description}}" name="description">
                  @if($errors->has('description'))
                    <div class="text-danger font-italic">{{ $errors->first('description') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="description">Poblacion</label>
                 <select name="poblation_id" id="" class="form-control">
                     <option selected value="{{$province->poblation->id}}">{{$province->poblation->description}}</option>
                     <option value="">Seleccionar población</option>

                     @foreach ($poblations as $poblacion)
                        <option value="{{$poblacion->id}}">{{$poblacion->description}}</option>
                     @endforeach
                 </select>
                 @if($errors->has('poblation_id'))
                    <div class="text-danger font-italic">{{ $errors->first('poblation_id') }}</div>
                  @endif
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

              </form>
           </div>
       </div>
    </div>
</div>
@endsection
