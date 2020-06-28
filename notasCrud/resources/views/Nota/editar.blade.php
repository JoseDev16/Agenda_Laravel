@extends('base')
@section('cont')
<h3 class="text-center "> Editar Nota #{{ $notaupt->id }}</h3>

<form action="{{ route('update', $notaupt->id ) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Titulo de Nota">Text</label>
        <input type="text" name="nombre" id="nombre" value="{{ $notaupt->nombre }}" class="form-control">

    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input id="descripcion" class="form-control" type="text" name="descripcion" value="{{ $notaupt->descripcion }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-success btn btn-block">Success</button>
    
</form>

@if(session('update'))
<div class="alert alert-success mt-3"> 
    {{ session('update') }}
</div>
@endif


@endsection 