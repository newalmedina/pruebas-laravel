@extends('layout')
@section('content')
<h3>Editar Población</h3>
<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('poblation.index')}}" class="btn btn-warning">Regresar</a>
    </div>
    <div class="col-md-12">
       <div class="card">
           <div class="card-body ">
            <form action="{{route('poblation.update',$poblation->id)}}" method="POST">
                @csrf
                <input type="hidden" value="PATCH" name="_method">
                <div class="form-group">
                  <label for="description">Descripción</label>
                  <input type="text" class="form-control" value="{{$poblation->description}}" name="description">
                  @if($errors->has('description'))
                    <div class="text-danger font-italic">{{ $errors->first('description') }}</div>
                  @endif
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

              </form>
           </div>
       </div>
    </div>
    <div class="col-md-12">
        <h4>Provincias</h4>
       <ul>
          @foreach ($poblation->provinces as $province)
              <li>{{$province->description}}</li>
          @endforeach
       </ul>

    </div>
</div>
@endsection
