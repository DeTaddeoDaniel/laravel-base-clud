<form action="{{route('empleado.update', $empleado->id)}}" method="post" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    
    @include('empleado.form')

    <button type="submit">Salva Modifiche</button>

</form>