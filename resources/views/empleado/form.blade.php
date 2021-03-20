
    {{-- <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre" placeholder="name" 
    value="{{Request::route()->getName() == 'empleado.create' ? '' : $empleado->Nombre}}">
    <br> --}}

    <h2 class="mb-3">{{$modo}}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input 
            type="text" name="Nombre" id="Nombre" placeholder="name" 
            value="{{ isset($empleado->Nombre) ? $empleado->Nombre : '' }}"
            class="form-control">
    </div>

    <div class="form-group">
        <label for="ApellidoPaterno">ApellidoPaterno</label>
        <input 
            type="text" name="ApellidoPaterno" id="ApellidoPaterno" placeholder="ApellidoPaterno" class="form-control" 
            value="{{isset($empleado->ApellidoPaterno) ? $empleado->ApellidoPaterno : ''}}">
    </div>

    <div class="form-group">
        <label for="ApellidoMaterno">ApellidoMaterno</label>
        <input 
            type="text" name="ApellidoMaterno" id="ApellidoMaterno" placeholder="ApellidoMaterno"  class="form-control"
            value="{{isset($empleado->ApellidoMaterno) ? $empleado->ApellidoMaterno : ''}}">
    </div>

    <div class="form-group">
        <label for="Correo">Correo</label>
        <input 
            type="text" name="Correo" id="Correo" 
            placeholder="Correo"  class="form-control"
            value="{{isset($empleado->Correo) ? $empleado->Correo : ''}}">
    </div>
    
    <div class="form-group">
        @if(isset($empleado->foto))
            <img src="{{asset('storage').'/'.$empleado->foto}}" height="50" alt="">
        @else
            <p>Foto</p>
        @endif

        <label for="foto"></label>
        <input type="file" name="foto" id="foto" class="form-controll mb-3">
    </div>

    <button type="submit" class="btn btn-success">{{$button}}</button>

    <a href="{{route('empleado.index')}}" class="btn btn-primary d-inline-block">Torna alla pagina precedente</a>


