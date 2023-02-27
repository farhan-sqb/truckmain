<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class UserManagement extends Controller
{



    public function dashboard()
    {
        $loggerFullName = (Cookie::get('loggername'));
        return view('userpages.index', compact('loggerFullName'));
    }








    public function sendEmail(Request $request)
    {
        $admincontactemail = DB::table('siteinfos')->where('id', 1)->value('general_mail');

        $post_fullName = $request["fullName"];
        $post_email = $request["email"];
        $post_phoneNumber = $request["phoneNumber"];
        $post_comment = $request["comment"];

        //mail part start
        $data = [
            'username' => $post_fullName,
            'userphone' => $post_phoneNumber,
            'useremail' => $post_email,
            'usercomment' => $post_comment,
        ];

        $user['to'] = $admincontactemail;
        Mail::send('mails.contactmail', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject((env('APP_NAME')) . " Email From Website");
        });
        //mail part ends

        return Redirect::back()->with('alertMsg', 'Email sent sucessfully. We will contact you soon')->with('type', 'success');
    }






















    //
}
