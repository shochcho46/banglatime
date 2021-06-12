<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($news);
       // $news  = News::all();

       // $news = DB::table('news')
       //     ->join('mainmenus', 'news.mainmenu_id', '=', 'mainmenus.id')
       //     ->join('users', 'news.user_id', '=', 'users.id')
       //     ->get();

    //    $news = News::orderBy('created_at', 'desc')->get();

       $news = News::orderBy('created_at', 'desc')->paginate(30);

        return view('adminviews.news.list', compact('news'));
    }


    public function newssearch(Request $request)
    {
        //dd($news);

        $pics = $request->input('normalsearch');

        return redirect()->route('news.getnewssearch', $pics);



    }




    public function newssearchget($normalsearch)
    {

       $news =  News::where('headline','like', '%' . $normalsearch . '%')
                            ->orWhere('description', 'like', '%' . $normalsearch . '%')->paginate(20);

       return view('adminviews.news.list', compact('news'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('adminviews.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $baseurl = url('/');
        $piclocation = array();

        $images = $request->file('picture');


        foreach ($images as  $value) {


            $extension = $value->extension();
            $filename = time() .rand(10,1000). '.' . $extension;
            $path =  $value->storeAs('newspic', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;
            array_push($piclocation, $fullpathurl);
        }



        $test = $this->validateRequest();
        $test['picture'] = $piclocation;
        $test['user_id'] =  Auth::id();


        News::create($test);

        // $news->save();
        // $extension = $request->file('picture')->extension();
        // $filename= time().'.'.$extension;
        // $path = $request->file('picture')->storeAs('newspic',$filename,'public');
        // $fullpathurl= $baseurl.'/storage/'.$path;

        return back()->with('success', 'News Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        // dd($news);

        return view('adminviews.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
        $test = $this->validateRequest();
        if ($request->hasFile('picture'))
         {
            $baseurl = url('/');
            $piclocation = array();

            $images = $request->file('picture');

            foreach ($images as  $value) {
                $extension = $value->extension();
                $filename = time() .rand(10,1000). '.' . $extension;
                $path =  $value->storeAs('newspic', $filename, 'public');
                $fullpathurl = $baseurl . '/storage/' . $path;
                array_push($piclocation, $fullpathurl);
            }
            $test['picture'] = $piclocation;
        }
         else {

        }
        $news->update( $test);
        return redirect()->route('news.index')->with('update','Data Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //dd($news);


        $baseurl = url('/');
        $path = $baseurl . '/storage/app/public/newspic/';

        foreach ($news->picture as $key => $value) {
            $link = $value;
            $link_array = explode('/', $link);
            $filename = end($link_array);
            $fullpath = 'newspic/' . $filename;
            Storage::disk('public')->delete($fullpath);
        }
        $news->delete();
        return back()->with('success', 'Data Deleted');
    }



    public function display(Request $request, News $news)
    {

        $news->headnews = 1;
        $news->save();
        return back()->with('update','Data Updated');
    }

    public function hidden(Request $request, News $news)
    {

        $news->headnews = 0;
        $news->save();
        return back()->with('update','Data Updated');
    }

    private function validateRequest()
    {


        if (request()->hasFile('picture')) {

            $data = request()->validate([
                'mainmenu_id' => 'required',
                'user_id' => '',
                'headline' => 'required|min:3',
                'description' => 'required|min:5',
                'journalist' => 'required|min:3',
                'picture' => '',
            ]);
        } else {
            $data = request()->validate([
                'mainmenu_id' => 'required',
                'user_id' => '',
                'headline' => 'required|min:3',
                'description' => 'required|min:5',
                'journalist' => 'required|min:3',
                'picture' => '',
            ]);
        }



        return $data;
    }
}
