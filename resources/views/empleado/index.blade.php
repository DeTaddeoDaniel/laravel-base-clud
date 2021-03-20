<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Fotografia</th>
            <th>Nombre</th>
            <th>cognome materno</th>
            <th>cognome paterno</th>
            <th>email</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($empleados as $empleado)
        <tr>
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->foto}}</td>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->ApellidoMaterno}}</td>
            <td>{{$empleado->ApellidoPaterno}}</td>
            <td>{{$empleado->Correo}}</td>
        </tr>
             @endforeach
    </tbody>
</table>