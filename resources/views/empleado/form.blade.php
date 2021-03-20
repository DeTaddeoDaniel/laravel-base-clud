    <a href="{{route('empleado.index')}}">Torna alla pagina precedente</a>

    {{-- <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre" placeholder="name" 
    value="{{Request::route()->getName() == 'empleado.create' ? '' : $empleado->Nombre}}">
    <br> --}}
    
    <label for="Nombre">Nombre</label>
    <input 
        type="text" name="Nombre" id="Nombre" placeholder="name" 
        value="{{ isset($empleado->Nombre) ? $empleado->Nombre : '' }}">
    <br>

    <label for="ApellidoPaterno">ApellidoPaterno</label>
    <input 
        type="text" name="ApellidoPaterno" id="ApellidoPaterno" placeholder="ApellidoPaterno" 
        value="{{isset($empleado->ApellidoPaterno) ? $empleado->ApellidoPaterno : ''}}">
    <br>

    <label for="ApellidoMaterno">ApellidoMaterno</label>
    <input 
        type="text" name="ApellidoMaterno" id="ApellidoMaterno" placeholder="ApellidoMaterno" 
        value="{{isset($empleado->ApellidoMaterno) ? $empleado->ApellidoMaterno : ''}}">
    <br>

    <label for="Correo">Correo</label>
    <input 
        type="text" name="Correo" id="Correo" 
        placeholder="Correo" 
        value="{{isset($empleado->Correo) ? $empleado->Correo : ''}}">
    <br>

    @if(isset($empleado->foto))
        <img src="{{asset('storage').'/'.$empleado->foto}}" height="50" alt="">
    @endif

    <label for="foto">Foto</label>
    <input type="file" name="foto" id="foto" >
    <br>



