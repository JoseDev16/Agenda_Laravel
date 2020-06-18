@extends('base')

@section('content')
<h2> crud prueba </h2>
@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif

<table class = "table table-bordered">
    <tr>
        <th> id </th>
        <th> Nombre </th>
        <th> Edad </th>
        <th> aprobado </th>

    </tr>
    @foreach ( $alumnos as $alumno )
    <tr> 
        <td> {{ $alumno->id}} </td>
        <td> {{ $alumno->nombre }} </td>
        <td> {{ $alumno->edad }} </td>
        <td> {{ $alumno->aprobado }} </td>
    </tr>
    
        
    @endforeach
</table>

    
    
@endsection