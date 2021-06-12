<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Mainmenu;
use App\Picture;

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
        // $user = auth()->user();
        //  var_dump($user->type);


        $user = Auth::user();
        $type = $user->type;
        $status = $user->status;

        if ($type == "NORMAL") {



        $pic = Picture::orderBy('created_at', 'desc')->get()->groupBy('day')->take(6);
        $headline = News::where('headnews', '1')->orderBy('id', 'desc')->first();

        $news = News::orderBy('created_at', 'desc')->get();
        $random = News::orderBy('created_at', 'desc')->inRandomOrder()->skip(15)->take(9)->get();
        $data = News::orderBy('created_at', 'desc')->take(100)->get();
        $maxReadNews = $data ->sortByDesc('count');
        return view('default',compact('news','headline','maxReadNews','random','pic'));


        }

        elseif (($type == "ADMIN") || ($type == "SUBADMIN")) {
            if ($status == 1) {
                return view('dashboard');
            }
            else{
                Auth::logout();
                return view('auth.login');
            }

        }
    }




}
