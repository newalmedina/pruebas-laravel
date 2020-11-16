@extends('layout')
@section('content')
<h3>Nueva Población</h3>
<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{route('poblation.index')}}" class="btn btn-warning">Regresar</a>
    </div>
    <div class="col-md-12">
       <div class="card">
           <div class="card-body ">
            <form action="{{route('poblation.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="description">Descripción</label>
                  <input type="text" class="form-control" value="{{old('description')}}" name="description">
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
</div>
@endsection
