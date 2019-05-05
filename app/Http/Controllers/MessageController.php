<?php

namespace App\Http\Controllers;

use App\Messages;
use App\User;
use http\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function list()
    {
        $messagesList = Messages::getMessegesList();


        $values = ['sender', 'text', '""', '"', '}', '{', ':', 'header', '[', ']', 'id', 'created_at'];


        $messages = array();

        for($i = 0; $i < count($messagesList); $i++) {

            $messagesList[$i] = str_replace($values, '', $messagesList[$i]);
            $messagesList[$i] = explode(',', $messagesList[$i]);


            $sender = User::getValue($messagesList[$i][1], 'name');
            array_push($messages, [$messagesList[$i][0], $sender, $messagesList[$i][2]]);

        }

        $data = [
            'messages' => $messages
        ];


        return view('messages', $data);
    }

    public function read($id)
    {
        $message = Messages::getMessage($id);


        $values = ['sender', 'text', '""', '"', '}', '{', ':', 'header', '[', ']', 'id', 'created_at', 'addressee'];

        $message = str_replace($values, '', $message);

        $message = explode(',', $message);

        $message[0] = User::getValue($message[0], 'name');
        $message[1] = User::getValue($message[1], 'name');



        $data = [
            'message' => $message
        ];

        return view('message', $data);
    }

    public function form(Request $request)
    {
        $input = $request->all();
        $addressee = User::getValue($input['addressee'], 'name');
        $sender = User::getValue($input['sender'], 'name');
        $addresseeid = $input['addressee'];
        $senderid = $input['sender'];

        $data = [
            'addressee' => $addressee,
            'sender' => $sender,
            'addresseeid' => $addresseeid,
            'senderid' => $senderid
        ];

        return view('messageform', $data);
    }

    public function send(Request $request)
    {
        $input = $request->all();

        $sender = $input['senderid'];
        $addressee = $input['addresseeid'];
        $header = $input['header'];
        $text = $input['text'];

        $date = date('d-m-Y H:i:s', time());

        Messages::sendMessage($addressee, $sender, $header, $text);


        return redirect()
            ->action('HomeController@index');
    }
}
