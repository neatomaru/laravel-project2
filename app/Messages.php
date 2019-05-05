<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Messages extends Model
{
    public static function getMessegesList()
    {
       return Messages::query()->where('addressee', Auth::id())->get(['id', 'sender', 'header', 'created_at']);
    }

    public static function getMessage($id)
    {
        return Messages::query()->where('id', $id)->get(['addressee', 'sender', 'header', 'text', 'created_at']);
    }

    public static function sendMessage($address, $sender, $header, $text)
    {
        Messages::query()->insert(['addressee' => $address, 'sender' => $sender, 'header' => $header, 'text' => $text]);
    }
}
