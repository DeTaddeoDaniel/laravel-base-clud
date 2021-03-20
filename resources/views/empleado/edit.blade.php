@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{route('empleado.update', $empleado->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            
            @include('empleado.form', ['modo' => 'Modifica dati dipedente', 'button' => 'Salva modifiche'])

        </form>

    </div>

@endsection