<form action="{{route('empleado.store')}}"" method="post" enctype="multipart/form-data">

    @csrf
    
    @include('empleado.form')

    <button type="submit">Salva nuovo dipedente</button>

</form>