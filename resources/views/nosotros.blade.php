@extends('plantilla')

@section('seccion')
<h1>Este es mi equipo de trabajo</h1>
@foreach($equipo as $persona)
<a href="{{ route('nosotros',$persona)}}" class="h4 text-danger">{{$persona}}</a><br>
@endforeach

@if(!empty($nombre))

@switch($nombre)
    @case($nombre=='Jose')
    <h2 class="mt-5">El nombre es Jose</h2>
    @break
    @case($nombre=='Luis')
    <h3 class="mt-5">El nombre es Luis</h3>
    @break

@endswitch

@endif

@endsection