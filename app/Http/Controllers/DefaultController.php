<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\News;
use App\Mainmenu;
use App\Picture;
use App\CommonPic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BangladateController;

class DefaultController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');

    }
    public function index()
    {
        //dd($news);



        // foreach ($pic as $name =>  $value) {
        //         echo('---');
        //     echo "{ $name}";
        //     echo ("<br>");
        //     foreach ($value as $key => $nvalue) {
        //         echo ( $value['0']->location);
        //         echo ("<br>");
        //     }
        // }




        date_default_timezone_set('Asia/Dhaka');
        $pic = Picture::orderBy('created_at', 'desc')->get()->groupBy('day')->take(6);
        $headline = News::where('headnews', '1')->orderBy('id', 'desc')->first();

        $news = News::orderBy('created_at', 'desc')->get();
        $random = News::orderBy('created_at', 'desc')->inRandomOrder()->skip(15)->take(9)->get();
        $data = News::orderBy('created_at', 'desc')->take(100)->get();
        $maxReadNews = $data ->sortByDesc('count');
        return view('default',compact('news','headline','maxReadNews','random','pic'));

    }





    public function picall($pics)
    {
        //dd($news);


        date_default_timezone_set('Asia/Dhaka');
        // $pic = Picture::orderBy('created_at', 'desc')->get()->groupBy('day')->take(10);
        // $pic = Picture::orderBy('created_at', 'desc')->get()->groupBy('day')->paginate(2);
        if ($pics == 1) {
            $pic= Picture::orderBy('created_at', 'desc')->paginate(6);

        }
        else
        {
            $pic=  Picture::where('day', '=', $pics)->paginate(6);

        }

        $gpic=  Picture::orderBy('created_at', 'desc')->get()->groupBy('day')->take(3);

        $news = News::orderBy('created_at', 'desc')->get();


        return view('picall',compact('news','pic','gpic'));

    }


    public function commonpicall($pics)
    {
        //dd($news);


        date_default_timezone_set('Asia/Dhaka');
        // $pic = Picture::orderBy('created_at', 'desc')->get()->groupBy('day')->take(10);
        // $pic = Picture::orderBy('created_at', 'desc')->get()->groupBy('day')->paginate(2);
        if ($pics == 1) {
            $pic= CommonPic::orderBy('created_at', 'desc')->paginate(6);

        }
        else
        {
            $pic=  CommonPic::where('day', '=', $pics)->paginate(6);

        }

        $gpic=  CommonPic::orderBy('created_at', 'desc')->get()->groupBy('day')->take(3);

        $news = News::orderBy('created_at', 'desc')->get();


        return view('commonpicall',compact('news','pic','gpic'));

    }


    public function normalsearch(Request $request)
    {
        //dd($news);


        date_default_timezone_set('Asia/Dhaka');

        $pics = $request->input('normalsearch');

        return redirect()->route('default.getnormalsearch', $pics);



    }


    public function normalsearchget($normalsearch)
    {

        // $normalsearch = 1;
       $cnews = News::all();

    //    $catagorynewz = $cnews->news()->latest('id')->paginate(8);

       $catagorynewz =  News::where('headline','like', '%' . $normalsearch . '%')
                            ->orWhere('description', 'like', '%' . $normalsearch . '%')->paginate(8);
       $news = News::orderBy('created_at', 'desc')->get();



       return view('normalsearch',compact('news','catagorynewz'));

    }


    public function picsearch(Request $request)
    {
        //dd($news);


        date_default_timezone_set('Asia/Dhaka');

        $pics = $request->input('date');

        return redirect()->route('default.getpicsearch', $pics);



    }


    public function commonpicsearch(Request $request)
    {
        //dd($news);


        date_default_timezone_set('Asia/Dhaka');

        $pics = $request->input('date');

        return redirect()->route('default.commongetpicsearch', $pics);



    }


    public function getpicsearch($date)
    {
        //dd($news);


        date_default_timezone_set('Asia/Dhaka');

        $pics = $date;

        $pic=  Picture::where('day', '=', $pics)->paginate(6);


        $gpic=  Picture::orderBy('created_at', 'desc')->get()->groupBy('day')->take(3);

        $news = News::orderBy('created_at', 'desc')->get();


        return view('picall',compact('news','pic','gpic'));

    }


    public function commongetpicsearch($date)
    {
        //dd($news);


        date_default_timezone_set('Asia/Dhaka');

        $pics = $date;

        $pic=  CommonPic::where('day', '=', $pics)->paginate(6);


        $gpic=  CommonPic::orderBy('created_at', 'desc')->get()->groupBy('day')->take(3);

        $news = News::orderBy('created_at', 'desc')->get();


        return view('commonpicall',compact('news','pic','gpic'));

    }





    public function archive()
    {

        date_default_timezone_set('Asia/Dhaka');
        $archivenews= News::orderBy('created_at', 'desc')->paginate(20);
        $news = News::orderBy('created_at', 'desc')->get();
        $data = News::orderBy('created_at', 'desc')->take(100)->get();
        $maxReadNews = $data ->sortByDesc('count');

        return view('archive',compact('news','maxReadNews','archivenews'));

    }



    public function archivesearch(Request $request)
    {
        //dd($news);
        date_default_timezone_set('Asia/Dhaka');
        $archivedate = $request->input('date');
        return redirect()->route('default.getsearch', $archivedate);

    }


    public function archivesearchget($date)
    {
        //dd($news);


        date_default_timezone_set('Asia/Dhaka');
        $archivedate = $date;
        $archivenews= News::whereDate('created_at',$archivedate)->paginate(10);
        $news = News::orderBy('created_at', 'desc')->get();
        $data = News::orderBy('created_at', 'desc')->take(100)->get();
        $maxReadNews = $data ->sortByDesc('count');
        return view('archive',compact('news','maxReadNews','archivenews'));

    }






    public function show(News $news)
    {
        //dd();

        $put =  new Carbon($news->created_at);
        $update =  new Carbon($news->updated_at);
        $insert = $put->toDayDateTimeString();
        $newupdate = $update->diffForHumans();

        $news->timestamps = false;
        $news->increment('count');


        // $allnews = News::orderBy('created_at', 'desc')->take(10)->get();
        $data = News::orderBy('created_at', 'desc')->take(100)->get();
        $maxReadNews = $data ->sortByDesc('count');

        return view('shownews',compact('news','maxReadNews','data','insert','newupdate'));

    }

    public function catagoryshow( $mainmenu)
    {

       // $mainmenu::with('news')->get();
       // $news = $mainmenu;
       // $news = News::where('mainmenu_id', $mainmenu)->get();
       // $nezcatagorynewz = Mainmenu::find($mainmenu)->news;
       //dd( $comments );
        // $catagorynewz =  $nezcatagorynewz ->sortByDesc('id');


       $cnews = Mainmenu::find($mainmenu);
       $catagorynewz = $cnews->news()->latest('id')->paginate(12);

       $news = News::orderBy('created_at', 'desc')->get();



       return view('catagorynewz',compact('news','catagorynewz'));

    }
}
