<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

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
        //
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
