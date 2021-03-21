@extends('layouts.app')

@section('js')

    @if (Session('delete') == 'delete')
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        </script>
    @elseif(Session('operation') == 'create')
        <script>
            Swal.fire(
                'Add person!',
                ' Person has been  add.',
                'success'
            )
        </script>
    @elseif(Session('operation') == 'update')
        <script>
            Swal.fire(
                'update!',
                ' the data is been update.',
                'success'
            )
        </script>
    @endif

    <script>

        $('.destroy-item').submit(function (e) { 
            e.preventDefault();
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });
    
    </script>
@endsection

@section('content')

    <div class="container">

        <a href="{{route('empleado.create')}}" class="btn btn-success mb-4">Registra nuovo dipedente</a>

        @if (Session::has('mensaje'))
            {{Session::get('mensaje')}}
        @endif

        <table class="table table-light">
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
                    <td>{{$empleado->Nombre}}</td>
                    <td>{{$empleado->ApellidoMaterno}}</td>
                    <td>{{$empleado->ApellidoPaterno}}</td>
                    <td>{{$empleado->Correo}}</td>
                    <td>
                        <a href="{{route('empleado.edit', $empleado->id)}}" class="btn btn-info text-light">Edit</a>

                        <form action="{{route('empleado.destroy', $empleado->id)}}" method="post" class="d-inline destroy-item">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancella</button>
                        </form>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>

    </div>
@endsection