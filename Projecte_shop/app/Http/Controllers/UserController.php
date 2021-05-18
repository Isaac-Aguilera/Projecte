<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$nick)
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.config')->with(['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $id = Auth::user()->id;

        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id]
        ])->validate();
        $user = User::find($id);
        $user->fill($data);
        $user->save();

        return redirect()->route('config')->with(['message' => 'User updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       //
    }

    public function password()
    {
        
        return view('user.password');
        
    }
    
    /**
     * Update the password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $data = $request->all();

        Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ])->validate();

        $id = Auth::user()->id;
        $user = User::find($id);
        $data['password'] = Hash::make($data['password']);
        $user->fill($data);
        $user->save();

        return redirect()->route('configPassword')->with(['message' => 'Password updated!']);
    }

    public function usersearch(Request $request,$name){
        // Get the search value from the request
        $search = $request->input('search');

        if(User::where('name', 'LIKE', "%{$name}%")->first()) {
            $user = User::where('name', '=', $name)->first();

            $id = $user->id;

            $posts = Video::query()
            ->where('user_id', '=', $id)
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
        }else {
            $posts = Video::query()
            ->where('name', 'LIKE', "%{$search}%"
            ->get();
        }

        return view('user.search')->with(['posts' => $posts, 'user' => $user]);
    }
}
