@extends('layouts.app')

@section('content')
    <div class="container">
    <form action="/edit" class="border border-left-0 border-right-0 py-4 my-4" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" id="fullname" placeholder="Ваше полное имя" name="fullname">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" placeholder="city"  name="city">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="phone"  name="phone">
        </div>
        <div class="form-group">
            <label for="social">Social</label>
            <input type="text" class="form-control" id="social" placeholder="social"  name="social">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
        </div>
        <div class="form-group">
            <label for="about">About</label>
            <textarea class="form-control" id="about" name="about" rows="5"></textarea>
        </div>
        @method('PUT')
        <div class="form-group">
            <label for="avatar">avatar</label>
            <input type="file" class="form-control-file" id="avatar"  name="avatar">
        </div>


        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
    </div>
    @endsection