@extends('layouts.app')

@section('content')

    <div class="container">

        <form action="{{route('empleado.store')}}" method="post" enctype="multipart/form-data">

            @csrf

            @include('empleado.form', ['modo' => 'Inserisci nuovo dipedente', 'button' => 'Inserisici dipedente'])

        </form>
    </div>
@endsection