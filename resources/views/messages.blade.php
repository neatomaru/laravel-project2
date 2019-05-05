@extends('layouts.app');

@section('content')
<div class="container">
  @foreach($messages as $message)

   <a href="/message/{{$message[0]}}">From: {{$message[1]}} Header: {{$message[2]}}</a>
      <br>

      @endforeach





</div>

    @endsection