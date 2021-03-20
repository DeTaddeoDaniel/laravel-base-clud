@extends('layouts.app')

@section('content')

    <div class="container">

        <form action="{{route('empleado.store')}}" method="post" enctype="multipart/form-data">

            @csrf

            @include('empleado.form', ['modo' => 'Modalità create'])

            <button type="submit">Salva nuovo dipedente</button>

        </form>
    </div>
@endsection