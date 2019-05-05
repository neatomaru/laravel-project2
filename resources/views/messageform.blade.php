@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/sendmessage" class="border border-left-0 border-right-0 py-4 my-4" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>От кого:</label>
                <input type="text" class="form-control" id="addressee" name="addressee" value="{{$sender}}" disabled>
                <input type="hidden" name="senderid" value="{{$addresseeid}}">
            </div>
            <div class="form-group">
                <label>Кому: </label>
                <input type="text" class="form-control" id="addressee"  name="addressee" value="{{$addressee}}" disabled>
                <input type="hidden" name="addresseeid" value="{{$senderid}}">
            </div>
            <div class="form-group">
                <label for="header">Заголовок сообщения</label>
                <input type="text" class="form-control" id="header" placeholder="Message Header"  name="header">
            </div>


            <div class="form-group">
                <label for="text">Текст сообщения</label>
                <textarea class="form-control" id="text" name="text" rows="5"></textarea>
            </div>


            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>


    @endsection