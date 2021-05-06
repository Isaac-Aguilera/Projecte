<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Video;
use App\Models\Categoria;
use Intervention\Image\ImageServiceProvider;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$nick)
    {
        $user = User::where('nick',$nick)->first();
        if (isset($user)) {

            $categorias = Categoria::all();

            $posts = Video::query()->where("user_id", "=", "{$user->id}")->orderBy('created_at','DESC')->get();
            return view('user.detall')->with(['user' => $user, 'posts' => $posts, 'categorias' => $categorias]);
        } else {
            return view('user.detall')->with(['error' => "No s'ha pogut trobar l'usuari!"]);
        }
    }

    public function uservid(Request $request,$nick)
    {
        $user = User::where('nick',$nick)->first();
        if (isset($user)) {
            $posts = Video::query()->where("user_id", "=", "{$user->id}")->orderBy('created_at','DESC')->get();
            return view('user.videos')->with(['user' => $user, 'posts' => $posts]);
        } else {
            return view('user.videos')->with(['error' => "No s'ha pogut trobar l'usuari!"]);
        }
    }

    public function userinfo(Request $request,$nick)
    {
        $user = User::where('nick',$nick)->first();
        if (isset($user)) {

            $posts = Video::query()->select('views')->where("user_id", "=", "{$user->id}")->get();
            return view('user.info')->with(['user' => $user,'views' => $posts]);
        } else {
            return view('user.info')->with(['error' => "No s'ha pogut trobar l'usuari!"]);
        }
    }

    public function usersearch(Request $request,$nick){
        // Get the search value from the request
        $search = $request->input('search');


        if(User::where('nick', 'LIKE', "%{$nick}%")->first()) {
            $user = User::where('nick', '=', $nick)->first();

            $id = $user->id;

 
            $posts = Video::query()
            ->where('user_id', '=', $id)
            ->where('title', 'LIKE', "%{$search}%")
            ->orderBy('views','DESC')
            ->get();
        }else {
            $posts = Video::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orderBy('views','DESC')
            ->get();
        }


        return view('user.search')->with(['posts' => $posts, 'user' => $user]);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $id = Auth::user()->id;

        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,' . $id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'file' => ['image'],
            ])->validate();

        $user = User::find($id);
        $i = $user->image;
        $user->fill($data);
        if (isset($data['file'])) {
            $p = $data['file']->store('avatars');
            Storage::disk('avatars')->delete($user->image);
            $user->image = $p;
        } else {
            $user->image = $i;
        }
        $user->save();

        return redirect()->route('config')->with(['message' => 'Usuari actualitzat correctament!']);
    }

    public function password()
    {
        
        return view('user.password');
        
    }

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

        return redirect()->route('configPassword')->with(['message' => 'Contrasenya actualitzada correctament!']);
    }


    public function canviardesc(Request $request) {
        Auth::user()->channel_desc = $request["desc"];
        Auth::user()->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
