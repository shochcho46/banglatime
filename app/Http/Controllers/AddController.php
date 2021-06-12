<?php

namespace App\Http\Controllers;

use App\Add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddController extends Controller
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
        //
        $add = Add::all();;

        return view('adminviews.addvertisment.list', compact('add'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminviews.addvertisment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);


        date_default_timezone_set('Asia/Dhaka');

        $baseurl = url('/');
        $images = $request->file('location');

            $extension = $images->extension();
            $filename = time() . '.' . $extension;
            $path =  $images->storeAs('newspic', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;

            $test = $this->validateRequest();
            $test['location'] =  $fullpathurl;

        Add::create($test);
        return back()->with('success', 'Advertisment Saved');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\add  $add
     * @return \Illuminate\Http\Response
     */
    public function show(Add $add)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\add  $add
     * @return \Illuminate\Http\Response
     */
    public function edit(Add $add)
    {
        //
        return view('adminviews.addvertisment.edit', compact('add'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\add  $add
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Add $add)
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
        $add->update( $test);
        return redirect()->route('addvertisment.index')->with('update','Data Update');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\add  $add
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add $add)
    {
        //
        $baseurl = url('/');
        $path = $baseurl . '/storage/app/public/newspic/';


            $link = $add->location;
            $link_array = explode('/', $link);
            $filename = end($link_array);
            $fullpath = 'newspic/' . $filename;
            Storage::disk('public')->delete($fullpath);

        $add->delete();
        return back()->with('success', 'Data Deleted');
    }


    private function validateRequest()
    {


        if (request()->hasFile('location')) {

            $data = request()->validate([

                'url' => 'required|min:1',
                'type' => 'required|min:1',
                'location' => '',
            ]);
        }
        else {
            $data = request()->validate([
                'url' => 'required|min:1',
                'type' => 'required|min:1',
                'location' => '',
            ]);
        }



        return $data;
    }
}
