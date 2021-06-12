<?php

namespace App\Http\Controllers;

use App\CommonPic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CommonPicController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $picture = CommonPic::orderBy('created_at', 'desc')->paginate(20);

        return view('adminviews.commonpic.list', compact('picture'));
    }


    public function picsearch(Request $request)
    {
        //dd($news);

        $pics = $request->input('normalsearch');

        return redirect()->route('Commonpicture.getnewssearch', $pics);



    }

    public function picsearchget($normalsearch)
    {

        $picture =  CommonPic::where('description','like', '%' . $normalsearch . '%')->paginate(20);

          return view('adminviews.commonpic.list', compact('picture'));

    }


    public function picdate(Request $request)
    {
        //dd($news);

        $pics = $request->input('date');

        return redirect()->route('Commonpicture.picdateget', $pics);




    }



    public function picdateget($date)
    {
        //dd($date);

        $picture =  CommonPic::where('day',$date)->paginate(20);

          return view('adminviews.commonpic.list', compact('picture'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */










    public function create()
    {
        //
        return view('adminviews.commonpic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        date_default_timezone_set('Asia/Dhaka');

        $baseurl = url('/');
        $images = $request->file('location');

            $extension = $images->extension();
            $filename = time() . '.' . $extension;
            $path =  $images->storeAs('newspic', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;

        $test = $this->validateRequest();
        $test['location'] =  $fullpathurl;
        $test['day'] =  date("Y-m-d");


        CommonPic::create($test);
        return back()->with('success', 'Picture Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommonPic  $commonPic
     * @return \Illuminate\Http\Response
     */
    public function show(CommonPic $commonPic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommonPic  $commonPic
     * @return \Illuminate\Http\Response
     */
    public function edit(CommonPic $picture)
    {
        //
        return view('adminviews.commonpic.edit', compact('picture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommonPic  $commonPic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommonPic $picture)
    {
        //
        $test = $this->validateRequest();
        if ($request->hasFile('location'))
         {
            $baseurl = url('/');


            $images = $request->file('location');


                $extension = $images->extension();
                $filename = time() . '.' . $extension;
                $path =  $images->storeAs('newspic', $filename, 'public');
                $fullpathurl = $baseurl . '/storage/' . $path;


            $test['location'] = $fullpathurl;
        }


         else {

        }
        $picture->update( $test);
        return redirect()->route('Commonpicture.index')->with('update','Data Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommonPic  $commonPic
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommonPic $commonPic)
    {
        //
        $baseurl = url('/');
        $path = $baseurl . '/storage/app/public/newspic/';


            $link = $commonPic->location;
            $link_array = explode('/', $link);
            $filename = end($link_array);
            $fullpath = 'newspic/' . $filename;
            Storage::disk('public')->delete($fullpath);

        $commonPic->delete();
        return back()->with('success', 'Data Deleted');
    }


    private function validateRequest()
    {


        if (request()->hasFile('location')) {

            $data = request()->validate([

                'description' => 'required|min:5',
                'day' => '',
                'location' => '',
            ]);
        }
        else {
            $data = request()->validate([
                'description' => 'required|min:5',
                'day' => '',
                'location' => '',
            ]);
        }



        return $data;
    }
}
