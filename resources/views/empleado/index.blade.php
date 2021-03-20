<a href="{{route('empleado.create')}}">Registra nuovo dipedente</a>

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
            <td><img src="{{asset('storage').'/'.$empleado->foto}}" alt="" height=50px></td>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->ApellidoMaterno}}</td>
            <td>{{$empleado->ApellidoPaterno}}</td>
            <td>{{$empleado->Correo}}</td>
            <td>
                <a href="{{route('empleado.edit', $empleado->id)}}">Edit</a>

                <form action="{{route('empleado.destroy', $empleado->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Cancella</button>
                </form>
            </td>
        </tr>
             @endforeach
    </tbody>
</table>