<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        // dd( $user);
        // $user = User::all();
        $user = User::where('type', "ADMIN") ->orWhere('type', 'SUBADMIN')->get();
         return view('adminviews.user.list', compact('user'));
    }

    public function normaluser()
    {
        // dd( $user);
        // $user = User::all();
        $user = User::where('type', "NORMAL")->get();
         return view('adminviews.user.normaluser', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminviews.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->password);
        $pass = $request->password;

        $data = $this-> validateRequest();
        $data['password'] = Hash::make($pass);
        User::create($data);
        return back()->with('success','Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        return view('adminviews.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $data = $this-> validateRequest();
        $pass = $request->password;
        $data['password'] = Hash::make($pass);

        if ($request->hasFile('location'))
        {
           $baseurl = url('/');


           $images = $request->file('location');


               $extension = $images->extension();
               $filename = time() . '.' . $extension;
               $path =  $images->storeAs('newspic', $filename, 'public');
               $fullpathurl = $baseurl . '/storage/' . $path;


           $data['location'] = $fullpathurl;

           $user->update( $data);
           return back()->with('success','Data Updated');
       }



       else {

        $user->update( $data);
        return redirect()->route('user.index')->with('update','Data Update');

        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return back()->with('success','Data Deleted');
    }


    public function disable(Request $request, User $user)
    {

        $user->status = 0;
        $user->save();
        return back()->with('update','Data Updated');
    }

    public function active(Request $request, User $user)
    {

        $user->status = 1;
        $user->save();
        return back()->with('update','Data Updated');
    }


    public function profile()
    {

        $userid =  Auth::id();
        $user = User::find($userid);
        if ($user->type == "NORMAL") {
            return view('profile',compact('user'));
        }

        if (($user->type == "SUBADMIN")|| ($user->type == "ADMIN")) {
            return view('adminviews.profile',compact('user'));
        }

    }



    private function validateRequest()
    {
    //    $data = request()->validate([
    //         'name' => 'required|min:3',
    //         'email' => 'required|email',
    //         'type' => 'required|min:1',
    //         'password' => 'required|min:8|confirmed',
    //     ]);






        if (request()->hasFile('location')) {

            $data = request()->validate([

            'name' => 'required|min:3',
            'email' => 'required|email',
            'type' => 'required|min:1',
            'password' => 'required|min:8|confirmed',
            'location' => '',
            ]);
        }
        else {
            $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'type' => 'required|min:1',
            'password' => 'required|min:8|confirmed',
            ]);
        }


        return $data;






    }

}
