<?php

namespace App\Http\Controllers;

use App\Mainmenu;
use Illuminate\Http\Request;

class MainmenuController extends Controller
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
        return view('adminviews.menus.list');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminviews.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Mainmenu::create($request->all());
        // return redirect('')->route("mainmenus.create")->with('message','Success');
        $data = $this-> validateRequest();
        Mainmenu::create($data);
        return back()->with('success','Data Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mainmenu  $mainmenu
     * @return \Illuminate\Http\Response
     */
    public function show(Mainmenu $mainmenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mainmenu  $mainmenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Mainmenu $mainmenu)
    {
        //
        $data = $mainmenu;
        return view('adminviews.menus.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mainmenu  $mainmenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mainmenu $mainmenu)
    {
        // Mainmenu::create($request->all());
        $data = $this-> validateRequest();
        $mainmenu->update($data);
        return redirect()->route('mainmenus.index')->with('update','Data Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mainmenu  $mainmenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mainmenu $mainmenu)
    {

        $mainmenu->delete();
        return back()->with('success','Data Deleted');
    }

    public function display(Request $request, Mainmenu $mainmenu)
    {

        $mainmenu->display = 1;
        $mainmenu->save();
        return back()->with('update','Data Updated');
    }

    public function hidden(Request $request, Mainmenu $mainmenu)
    {

        $mainmenu->display =0;
        $mainmenu->save();
        return back()->with('update','Data Updated');
    }

    private function validateRequest()
    {
       $data = request()->validate([
            'banglaname' => 'required|min:3',
            'englishname' => 'required|min:3',
            'order' => 'required|min:1',
        ]);
        return $data;
    }
}
