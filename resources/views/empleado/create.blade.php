<form action="{{route('empleado.store')}}"" method="post" enctype="multipart/form-data">

    @csrf

    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre" placeholder="nome">
    <br>
    
    <label for="ApellidoPaterno">ApellidoPaterno</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" placeholder="ApellidoPaterno">
    <br>

    <label for="ApellidoMaterno">ApellidoMaterno</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" placeholder="ApellidoMaterno">
    <br>

    <label for="Correo">Correo</label>
    <input type="text" name="Correo" id="Correo" placeholder="Correo">
    <br>

    <label for="foto">Foto</label>
    <input type="file" name="foto" id="foto" >
    <br>

    <button type="submit">Salva nuovo dipedente</button>

</form>