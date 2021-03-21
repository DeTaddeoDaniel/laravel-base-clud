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
        
        $request->validate([
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',
            'foto' => 'required|max:10000|mimes:jpeg,jpg,png'
        ]);
        
        $data = request()->except('_token','_method');

        
        # se è presente una foto
        if($request->hasFile('foto')){
            # campo foto  - rotta del foto       - salva nello store (rotta, posizione)
            $data['foto'] = $request->file('foto')->store('uploads','public');
        }

        Empleado::insert($data);
        
        return redirect()->route('empleado.index')->with('mensaje','Dipedente aggiunto con successo');
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

        $request->validate([
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',
            'foto' => 'required|max:10000|mimes:jpeg,jpg,png'
        ]);

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
        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado  $empleado)
    {
        if (Storage::delete('public/'.$empleado->foto)) {
            Empleado::destroy($empleado->id);
        }

        return redirect()->route('empleado.index')->with('delete','ok');;

    }
}
