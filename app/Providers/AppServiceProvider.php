<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $sitename = DB::table('siteinfos')->where('id', 1)->value('sitename');
        View::share('sitename', $sitename);

        $sitelogo = DB::table('siteinfos')->where('id', 1)->value('site_logo');
        View::share('sitelogo', $sitelogo);

        $adminLink = DB::table('siteinfos')->where('id', 1)->value('adminpanelurl');
        View::share('adminLink', $adminLink);

        $websiteurl = DB::table('siteinfos')->where('id', 1)->value('websiteurl');
        View::share('websiteurl', $websiteurl);

        $contactEmail = DB::table('siteinfos')->where('id', 1)->value('general_mail');
        View::share('contactEmail', $contactEmail);

        $contactPhone = DB::table('siteinfos')->where('id', 1)->value('contact_phone');
        View::share('contactPhone', $contactPhone);

        $brandAddr = DB::table('siteinfos')->where('id', 1)->value('address');
        View::share('brandAddr', $brandAddr);
        //
    }
}
