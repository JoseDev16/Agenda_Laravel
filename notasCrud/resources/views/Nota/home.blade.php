@extends('base')
@section('scripts')

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <!-- Datepicker Files -->
 <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
 <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker.standalone.css')}}">
 <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
 <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
 <!-- Languaje -->
 <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    
@endsection

@section('cont')
 
    <div class="row">
        <div class="col-md-7">
            
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    @foreach ($notas as $nota)
                        <tr>
                            <td> {{ $nota->id }}</td>
                            <td> {{ $nota->nombre }}</td>
                            <td>{{ $nota->descripcion }}</td>
                            <td>{{ $nota->fecha }}</td>
                            <td> @if ($nota->terminado) 
                                <p> Tarea Realizada &#127941;</p>
                                

                                @else
                               
                                <p> En proceso &#9201;</p>
                                @endif
                                                          

                                
                             </td>
                            <td>
                                 <a href="{{ route('editar', $nota->id) }}" class="btn btn-info" >Editar</a>
                                 <form action="{{ route('eliminar',$nota->id) }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>

                            
                            </td>
                        </tr>
                        
                    @endforeach
                </thead>

            </table>
            {{ $notas->links() }}
        </div>
            
        

        <!-- inicio fila formulario-->
            <div class="col-md-4">
                <h3 class=" text-center pb-5"> Agregar Nota para {{ Auth::user()->name }} </h3>

                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Titulo de la Nota" required>
                        
                    </div>

                    <div class="form-group">
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese la descripcion de la Nota" required title="llenelo">
                    
                    </div>

                    <div class="form-group">
                        
                        <input type="text" class="form-control datepicker" name="fecha" placeholder="Click para ingresar fecha">
                    </div>

                    <div class="form-check">
                        <input id="terminado" class="form-check-input" type="checkbox" name="terminado" value="1" >
                        <label for="terminado" class="form-check-label">Tarea terminada?  Toca el reloj! &#9200;</label>
                    </div>
                   
                    
                    <button type="submit" class="btn btn-success btn-block"> Guardar Nota</button>
                </form>

                @if(session('exito'))
                    <div class="alert alert-success mt-3"> 
                        {{ session('exito') }}
                    </div>


                
                @endif
                @if(session('destroy'))
                <div class="alert alert-success mt-3"> 
                    {{ session('destroy') }}
                </div>


            
            @endif


            </div>
            <!--fin fila form-->
        
        
        

    </div>
    <script>
        $('.datepicker').datepicker({
    format: "yyyy/mm/dd",
    todayBtn: "linked",
    language: "es",
    daysOfWeekHighlighted: "5,6",
    autoclose: true,
    todayHighlight: true
});
    </script>

 
@endsection