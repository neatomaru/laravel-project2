@extends('layouts.app')

@section('content')


    @foreach($message as $t)
    <p>{{$t}}</p>

    @endforeach


    @endsection