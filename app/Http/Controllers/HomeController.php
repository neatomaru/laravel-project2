<?php

namespace App\Http\Controllers;

use App\FriendList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\UserDetails;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $userid = Auth::id();
        if (UserDetails::getDetail('avatar') == null) {
            $avatar = 'images/unnamed.jpg';
        } else {
            $avatar = UserDetails::getDetail('avatar');
        }
        $city = UserDetails::getDetail('city');
        $phone = UserDetails::getDetail('phone');
        $social = UserDetails::getDetail('social');
        $fullname = UserDetails::getDetail('fullname');
        $birthday = UserDetails::getDetail('birthday');
        $about = UserDetails::getDetail('about');

        $friendlist[] = FriendList::getFriends();
        $vowels = array('friend_id', '[', ']', ',', '""', '{', ':');
        $friendes = str_replace($vowels, '', $friendlist[0]);
        $friends = explode('}', $friendes);


        $friendslist = array();


        for($i = 0; $i < count($friends); $i++)
        {
            $name = User::getValue($friends[$i], 'name');


            $friendslist[$name] = '/profile/'.$friends[$i];


        }


        $age = Carbon::parse($birthday)->diffInYears();


        $data = [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'avatar' => $avatar,
            'city' => $city,
            'phone' => $phone,
            'social' => $social,
            'fullname' => $fullname,
            'birthday' => $age,
            'about' => $about,
            'userid' => $userid,
            'friends' => $friends,
            'friendslist' => $friendslist

        ];

        return view('homepage', $data);
    }


    public function form()
    {
        return view('update');
    }

    public function edit(Request $request)
    {
        $input = $request->all();

        if (UserDetails::getDetail('id') == null) {

            UserDetails::insertDetail('avatar', 'images/unnamed.jpg');


        }


        if (isset($input['city'])) {
            $city = $input['city'];
            UserDetails::setDetail('city', $city);

        }
        if (isset($input['fullname'])) {
            $fullname = $input['fullname'];
            UserDetails::setDetail('fullname', $fullname);

        }
        if (isset($input['phone'])) {
            $phone = $input['phone'];
            UserDetails::setDetail('phone', $phone);

        }

        if (isset($input['social'])) {
            $social = $input['social'];
            UserDetails::setDetail('social', $social);

        }

        if (isset($input['birthday'])) {
            $birthday = $input['birthday'];
            UserDetails::setDetail('birthday', $birthday);
        }

        if (isset($input['about'])) {
            $about = $input['about'];
            UserDetails::setDetail('about', $about);
        }

        if (isset($input['avatar'])) {
            if (UserDetails::getDetail('avatar') != 'images/unnamed.jpg') {
                unlink(public_path(UserDetails::getDetail('avatar')));
            }
            $file = $request->file('avatar');
            $destinationpath = 'images/';
            $filename = md5(Auth::user()->name);
            $guessExtension = $file->guessExtension();
            $file->move($destinationpath, $filename . '.' . $guessExtension);

            $fullpath = $destinationpath . $filename . '.' . $guessExtension;

            UserDetails::setDetail('avatar', $fullpath);

        }


        return redirect()
            ->action('HomeController@index');

    }

    public function show($id)
    {
        $pageID = $id;

        $avatar = UserDetails::getDetail('avatar', $pageID);
        $city = UserDetails::getDetail('city', $pageID);
        $phone = UserDetails::getDetail('phone', $pageID);
        $social = UserDetails::getDetail('social', $pageID);
        $fullname = UserDetails::getDetail('fullname', $pageID);
        $birthday = UserDetails::getDetail('birthday', $pageID);
        $about = UserDetails::getDetail('about', $pageID);
        $name = User::getValue($pageID, 'name');
        $friendlist[] = FriendList::getFriends();
        $vowels = array('friend_id', '[', ']', ',', '""', '{', ':');
        $friendes = str_replace($vowels, '', $friendlist[0]);
        $friends = explode('}', $friendes);

        $friendslist = array();


        for($i = 0; $i < count($friends); $i++)
        {
            $username = User::getValue($friends[$i], 'name');


            $friendslist[$username] = '/profile/'.$friends[$i];


        }


        $age = Carbon::parse($birthday)->diffInYears();

        $data = [
            'username' => $name,
            'avatar' => $avatar,
            'city' => $city,
            'phone' => $phone,
            'social' => $social,
            'fullname' => $fullname,
            'birthday' => $age,
            'about' => $about,
            'userid' => $pageID,
            'friends' => $friends,
            'friendslist' => $friendslist
        ];

        return view('profile', $data);

    }



}