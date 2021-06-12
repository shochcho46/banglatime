<?php

namespace App\Http\Controllers;

use App\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaveController extends Controller
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
        $userid = Auth::id();

        $data = DB::table('saves')
            ->join('users', 'saves.user_id', '=', 'users.id')
            ->join('news', 'saves.news_id', '=', 'news.id')
            ->select('saves.id as saveid','news.id as newsid','saves.created_at as savetime', 'users.id as userid', 'news.headline','news.picture','news.description')
            ->where('users.id',$userid)
            ->orderBy('saves.id','DESC')
            ->paginate(15);


        return view('savenewz',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $this->validateRequest();

        Save::firstOrCreate($data);

        return back()->with('success','Data Saved');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Save  $save
     * @return \Illuminate\Http\Response
     */
    public function show(Save $save)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Save  $save
     * @return \Illuminate\Http\Response
     */
    public function edit(Save $save)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Save  $save
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Save $save)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Save  $save
     * @return \Illuminate\Http\Response
     */
    public function destroy(Save $save)
    {
        //
        $save->delete();
        return back()->with('success', 'Data Deleted');
    }

    private function validateRequest()
    {
       $data = request()->validate([
            'news_id' => 'required',
            'user_id' => 'required',

        ]);
        return $data;
    }
}
