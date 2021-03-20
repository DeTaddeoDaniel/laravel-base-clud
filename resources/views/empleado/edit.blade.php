<form action="{{route('empleado.update', $empleado->id)}}" method="post" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre" placeholder="name" 
    value="{{Request::route()->getName() == 'empleado.create' ? '' : $empleado->Nombre}}">
    <br>
    
    <label for="ApellidoPaterno">ApellidoPaterno</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" placeholder="ApellidoPaterno" value="{{Request::route()->getName() == 'empleado.create' ? '' : $empleado->ApellidoPaterno}}">
    <br>

    <label for="ApellidoMaterno">ApellidoMaterno</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" placeholder="ApellidoMaterno" value="{{Request::route()->getName() == 'empleado.create' ? '' : $empleado->ApellidoMaterno}}">
    <br>

    <label for="Correo">Correo</label>
    <input type="text" name="Correo" id="Correo" placeholder="Correo" value="{{Request::route()->getName() == 'empleado.create' ? '' : $empleado->Correo}}">
    <br>

    <label for="foto">Foto</label>
    <input type="file" name="foto" id="foto" >

    <img src="{{asset('storage').'/'.$empleado->foto}}" alt="" value="{{$empleado->foto}}" height=50px>
    <br>



    <button type="submit">Salva Modifiche</button>

</form>