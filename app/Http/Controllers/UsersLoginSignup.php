<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class UsersLoginSignup extends Controller
{

    public function loginPage()
    {
        return view('loginout.login');
    }







    public function signupPage()
    {
        $otpask = 0;
        return view('loginout.signup', compact('otpask'));
    }





    public function forgetPassPage()
    {
        return view('loginout.forgetpassword');
    }


















    public function signupNewUser(Request $request)
    {
        $sign_fname = $request->fname;
        $sign_lname = $request->lname;
        $sign_email = $request->email;
        $sign_mobileNumber = $request->mobileNumber;
        $sign_password = $request->password;
        $bcryptedpass = bcrypt($sign_password);

        $otp = rand(000000, 999999);
        $fullname = ($sign_fname . ' ' . $sign_lname);


        $check = DB::table('users')->where('email', $sign_email)->count();
        if ($check > 0) {
            return Redirect::back()->with('alertMsg', 'User already exists. Try Different Email!')->with('type', 'alert-danger');
        } else {
            $insert = DB::table('users')->insert([
                'fname' => $sign_fname,
                'lname' => $sign_lname,
                'email' => $sign_email,
                'phone' => $sign_mobileNumber,
                'password' => $bcryptedpass,
                'otp' => $otp
            ]);

            if ($insert) {

                // send otp to email first. 
                $data = [
                    'username' => $sign_fname . ' ' . $sign_lname,
                    'userotp' => $otp,
                ];

                $user['to'] = $sign_email;
                Mail::send('mails.signupmail', $data, function ($message) use ($user) {
                    $message->to($user['to']);
                    $message->subject((env('APP_NAME')) . " - OTP For Sign Up");
                });
                //mail part ends


                // set cookies 
                $mints = (60 * 48);
                Cookie::queue('trialEmail', $sign_email, $mints);
                Cookie::queue('trialname', $fullname, $mints);
                return redirect('/user-verification');
            } else {
                return Redirect::back()->with('alertMsg', 'Try later. Could not Add!!')->with('type', 'alert-danger');
            }
        }
    }
















    public function showOTPpage()
    {
        $otpask = 1;
        return view('loginout.signup', compact('otpask'));
    }










    public function verifySignUpOtp(Request $request)
    {
        if (!(Cookie::get('trialEmail'))) {
            return Redirect::back()->with('alertMsg', 'Too much time for verification. Try signing up with another mail.')->with('type', 'alert-warning');
        } else {

            $user_email = (Cookie::get('trialEmail'));
            $user_otp = $request->digits_otp;
            $server_otp = DB::table('users')->where('email', $user_email)->value('otp');

            if ($server_otp == $user_otp) {
                //set login cookies 

                $fullname = (Cookie::get('trialname'));
                $mints = (60 * 24 * 30);
                Cookie::queue('loggerEmail', $user_email, $mints);
                Cookie::queue('loggername', $fullname, $mints);

                Cookie::queue(Cookie::forget('trialEmail'));
                Cookie::queue(Cookie::forget('trialname'));

                DB::table('users')->where('email', $user_email)->update(['verified' => '1']);

                return redirect('/users/dashboard');
            } else {
                return Redirect::back()->with('alertMsg', 'OTP Did not match. Try again.')->with('type', 'alert-danger');
            }
        }
    }














    public function loginExistingUser(Request $request)
    {
        $user_email = $request->loginEmail;
        $user_password = $request->loginPassword;

        $check = DB::table('users')->where('email', $user_email)->where('verified', '1')->where('active', '1')->count();

        if ($check > 0) {

            $type = DB::table('users')->where('email', $user_email)->value('user_type');
            if ($type == 'google') {
                return Redirect::back()->with('alertMsg', 'Please try login with the google account you once logged in with.')->with('type', 'alert-warning');
            } else {


                $users_dbpass = DB::table('users')->where('email', $user_email)->value('password');
                $users_fname = DB::table('users')->where('email', $user_email)->value('fname');
                $users_lname = DB::table('users')->where('email', $user_email)->value('lname');
                $pass_check = password_verify($user_password, $users_dbpass);


                if ($pass_check) {
                    $fullname = ($users_fname . ' ' . $users_lname);
                    $mints = (60 * 24 * 30);
                    Cookie::queue('loggerEmail', $user_email, $mints);
                    Cookie::queue('loggername', $fullname, $mints);

                    return redirect('/users/dashboard');
                } else {
                    return Redirect::back()->with('alertMsg', 'Passwords not matched. Try again.')->with('type', 'alert-danger');
                }
            }
        } else {
            return Redirect::back()->with('alertMsg', 'Email not matched or user not verified. Or your account is deactivated by admin. Try again.')->with('type', 'alert-danger');
        }
    }


















    public function changeUsersPassword(Request $request)
    {
        $user_email = $request->useremail;
        $user_new_password = $request->newPassword;
        $bcryptpass = bcrypt($user_new_password);
        $otp = rand(000000, 999999);

        $check = DB::table('users')->where('email', $user_email)->count();
        if ($check > 0) {
            DB::table('users')->where('email', $user_email)->update([
                'password' => $bcryptpass,
                'otp' => $otp,
                'verified' => '0',
            ]);

            $fullname = DB::table('users')->where('email', $user_email)->value('fname');
            $lastname = DB::table('users')->where('email', $user_email)->value('lname');

            //mail part start
            $data = [
                'username' => $fullname . ' ' . $lastname,
                'userotp' => $otp,
            ];

            $user['to'] = $user_email;
            Mail::send('mails.forgetpawd', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject((env('APP_NAME')) . " - Retrive Account!");
            });
            //mail part ends







            $mints = (60 * 24 * 30);
            Cookie::queue('trialEmail', $user_email, $mints);


            return Redirect::back()->with('askotp', '1');
        } else {
            return Redirect::back()->with('alertMsg', 'Account email not matched.')->with('type', 'alert-danger');
        }
    }















    public function crossCheckPassChangeOTP(Request $request)
    {
        $user_email = (Cookie::get('trialEmail'));
        $user_otp = $request->pass_change_otp;
        $server_otp = DB::table('users')->where('email', $user_email)->value('otp');

        if ($server_otp == $user_otp) {
            Cookie::queue(Cookie::forget('trialEmail'));
            DB::table('users')->where('email', $user_email)->update(['verified' => '1']);

            return Redirect::back()->with('alertMsg', 'Your Passwords Been Changed Successfully. Login with new password now.')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('alertMsg', 'OTP Did not match. Try again.')->with('type', 'alert-danger')->with('askotp', '1');
        }
    }













    public function logoutUser()
    {
        if ((Cookie::get('loggerEmail'))) {
            Cookie::queue(Cookie::forget('loggerEmail'));
        }
        if ((Cookie::get('loggername'))) {
            Cookie::queue(Cookie::forget('loggername'));
        }
        return redirect('/login');
    }

    //
}
