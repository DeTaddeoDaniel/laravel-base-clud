<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # creiamo una variabile e inseriamo [], dove dentro mettiamo il nome della variabile che ci permettera di vedere i risultati dentro il blade

        $data['empleados'] = Empleado::paginate(500);
        return View('empleado.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = request()->all();
        
        $data = request()->except('_token','_method');
        
        # se è presente una foto
        if($request->hasFile('foto')){
            # campo foto  - rotta del foto       - salva nello store (rotta, posizione)
            $data['foto'] = $request->file('foto')->store('uploads','public');
        }

        Empleado::insert($data);

        // return response()->json($data);
        $data['empleados'] = Empleado::paginate(500);
        return View('empleado.update',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return View('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $data = request()->except('_token','_method');

        # controlla se l'immagine è cambiata
        if($request->hasFile('foto')){
            # trova foto anteriore
            $remove = Empleado::findOrFail($empleado->id);
            # cancella foto interiore
            Storage::delete('public/'.$empleado->foto);
            # se ci sono cambi della foto cambia con la nuova immagine
            $data['foto'] = $request->file('foto')->store('uploads','public');
        }
        
        $empleado::where('id','=',$empleado->id)->update($data);

        // return response()->json($data);
        $data['empleados'] = Empleado::paginate(500);
        return View('empleado.index',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect('empleado');

    }
}
