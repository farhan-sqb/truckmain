<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;



class GoogleController extends Controller
{




    // google signup
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }









    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $loggertype = 'google';
        $loggerEmail = ($user->email);
        $loggerName = ($user->name);


        $count = DB::table('users')->where('email', $loggerEmail)->count();

        if ($count > 0) {
            $type = DB::table('users')->where('email', $loggerEmail)->value('user_type');
            if ($type == 'google') {
                $mints = (60 * 24 * 30);
                $fullname = ($loggerName);
                Cookie::queue('loggerEmail', $loggerEmail, $mints);
                Cookie::queue('loggername', $fullname, $mints);
                return redirect('/users/dashboard');
            } else {
                return redirect('/login')->with('alertMsg', 'Please login with your original Email & Password')->with('type', 'alert-warning');
            }
        } else {

            $insert = DB::table('users')->insert([
                'fname' => $loggerName,
                'lname' => '',
                'verified' => 1,
                'user_type' => $loggertype,
                'email' => $loggerEmail,
            ]);


            $mints = (60 * 24 * 30);
            $fullname = ($loggerName);
            Cookie::queue('loggerEmail', $loggerEmail, $mints);
            Cookie::queue('loggername', $fullname, $mints);

            if ($insert) {
                return redirect('/users/dashboard');
            }
        }
    }













    public function googleLogin()
    {
    }












    //
}
