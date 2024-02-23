@extends('layouts.app')

@section('content')
    <h1>Puntos acumulador: {{$puntaje->puntos}}</h1>
    <a href="{{ route('juegos.index') }}">< REGRESAR</a>
    <iframe src="{{ route('juegos.'.$juego) }}" width="100%" height="600" frameborder="0" allowfullscreen></iframe>
@endsection
