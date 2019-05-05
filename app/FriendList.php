<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FriendList extends Model
{
    public static function getFriends() {

        return FriendList::query()->where('user_id', Auth::id())->get('friend_id');
    }


    public static function addFriend($friendid)
    {
        FriendList::query()->insert(['user_id' => Auth::id(), 'friend_id' => $friendid]);
    }

    public static function deleteFriend($friendid)
    {
        FriendList::query()->where(['user_id' => Auth::id(), 'friend_id' => $friendid])->delete();
    }

}
