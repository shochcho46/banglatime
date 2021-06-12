<?php

namespace App\Providers;
use App\Mainmenu;
use App\Add;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\BangladateController;


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


        view()->composer(['adminviews.menus.*','layouts.*','adminviews.news.*','default','footer','footernewz'], function ($view) {
            $view->with('mainmenu', Mainmenu::orderBy('order','asc')->get());
          });

        view()->composer(['default','layouts.*','catagorynewz','shownews','picall','archive','normalsearch','commonpicall'], function ($view) {
            $view->with('add', Add::all());
          });



        view()->composer(['*'], function ($view) {
                $pricesClass = new BangladateController(time(),0);
                $bangladate =  $pricesClass->get_date();
                $ebadate =  $pricesClass->englishdate();
                $edate =  date("l, F j, Y");
                $view->with('bdate', $bangladate)
                    ->with('bedate', $ebadate)
                    ->with('edate', $edate);
          });


        //
    }
}
