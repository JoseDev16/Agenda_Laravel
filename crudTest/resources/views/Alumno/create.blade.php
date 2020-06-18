@extends('base')
@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Ingresar estudiante</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('Alumno.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('Alumno.store') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>nombre:</strong>

                <input type="text" name="nombre" class="form-control" placeholder="nombre">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Edad:</strong>

                <input type="number" name="edad" class="form-control" value="1" placeholder="edad">

            </div>


        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Aprobado:</strong>

                <input type="checkbox" name="aprobado" class="switch-input" placeholder="aprobado">

            </div>


        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Registrar</button>

        </div>

    </div>

   

</form>
    
@endsection