<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserDetails extends Model
{
    public static function getDetail($value, $id = null)
    {
        if ($id == null) {
            return UserDetails::query()->where('user_id', Auth::id())->value($value);

        } else {
            return UserDetails::query()->where('user_id', $id)->value($value);
        }
    }

    public static function setDetail($column, $value) {

         UserDetails::query()->where('user_id', Auth::id())->update([$column => $value]);
    }

    public static function insertDetail($column, $value) {

        UserDetails::query()->insert(['user_id' => Auth::id(), $column => $value]);
    }
}
