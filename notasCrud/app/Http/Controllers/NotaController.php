<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $notas=Nota::where('user_id',$request->user()->id )->paginate(3);
        return \view('Nota/home',compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        /* hay 2 formas. Esta es para guardar todo de una ves*/
        #Nota::create($request->all());
        #esta es para guardar atributo por atributo

        #Creamos la instancia
        #dd($request->all());
        $nt = new Nota;
        $check=1;
        $nt->nombre = $request->nombre;
        $nt->fecha = $request->fecha;
        $nt->descripcion = $request->descripcion;
        if($request->terminado!= 1){
            $check = 0;
        }
        $nt->terminado= $check;
        $nt->user_id = $request->user()->id;
        

        
        $nt->save();
        return back()->with('exito', 'Listo! Tu nota ha sido agregada correctamente.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $notaupt = Nota::findOrFail($id);
        return view('Nota/editar', compact('notaupt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $notaupt = Nota::findOrFail($id);
        $notaupt->nombre = $request->nombre;
        
        $notaupt->descripcion = $request->descripcion;
        $notaupt->save();
        return back()->with('update', 'Listo! Tu nota ha sido modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('destroy', ':( nota eliminada');
        
    }
}
