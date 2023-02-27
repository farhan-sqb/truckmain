<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageControllers extends Controller
{



    public function indexPage()
    {
        return view('homepage.index');
    }





    public function howitworksPage()
    {
        return view('pages.howitworks');
    }




    public function reviewsPage()
    {
        $reviews = DB::table('reviews')->orderBy('id', 'desc')->limit(5)->get();
        $number = 5;
        return view('pages.reviews', compact('reviews', 'number'));
    }



    public function allreviewsPage()
    {
        $reviews = DB::table('reviews')->orderBy('id', 'desc')->get();
        $number = 'all';
        return view('pages.reviews', compact('reviews', 'number'));
    }




    public function help_supportPage()
    {
        $faqs = DB::table('faqpagedata')->orderBy('id', 'desc')->get();
        return view('pages.help', compact('faqs'));
    }




    public function aboutPage()
    {
        $textdata = DB::table('otherpages')->where('pagename', 'about')->get();
        $teammember = DB::table('leadershipteam')->orderBy('id', 'desc')->get();
        return view('pages.about', compact('textdata', 'teammember'));
    }




    public function dispatchersPage()
    {
        return view('pages.patcherspage');
    }




    public function privacyPage()
    {
        $textdata = DB::table('otherpages')->where('pagename', 'privacy')->get();
        return view('pages.privacy', compact('textdata'));
    }




    public function termsPage()
    {
        $textdata = DB::table('otherpages')->where('pagename', 'terms')->get();
        return view('pages.terms', compact('textdata'));
    }











    //
}
