<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Video;
use App\Models\Categoria;
use App\Models\Valoracio;
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
            return view('user.detall')->with(['error' => "User not found!"]);
        }
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
        if (isset(Auth::user()->id)) {
            return view('user.config')->with(['user' => Auth::user()]);
        } else {
            return view('user.config')->with(['error' => "User not found!"]);
        }
        
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
            Storage::delete($user->image);
            $user->image = $p;
        } else {
            $user->image = $i;
        }
        $user->save();

        return redirect()->route('config')->with(['message' => 'User updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
        $id = $request['id'];
        $user = User::find($id);
        foreach ($user->videos as $video) {
            Storage::delete($video->video_path);
            Storage::delete($video->image);
            $video->delete();
        }
        Storage::delete($user->image);
        Storage::delete($user->banner);
        $user->delete();
        
     }

    /**
     * Change password.
     *
     * @return \Illuminate\Http\Response
     */
     public function password()
    {
        if (isset(Auth::user()->id)) {
            return view('user.password');
        } else {
            return redirect('login');
        }
        
        
    }

    /**
     * Update the password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        if (!isset(Auth::user()->id)) {
            return redirect('login');
        }
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

    /**
     * Update the user description.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function canviardesc(Request $request) {
        Auth::user()->channel_desc = $request["desc"];
        Auth::user()->save();
    }

    /**
     * Update the user banner.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function canviarbanner(Request $request) {
        $f = $request->file('img_logo');
        
        if ($f == null) {
            $nick = Auth::user()->nick;
            $posts = Video::query()->select('views')->where("user_id", "=", Auth::user()->id)->get();
            return redirect('/user/'.$nick.'/info')->with(['user' => Auth::user(),'views' => $posts,'incorrecte' => "You have to upload a file"]);
        }
        $p = $f->store('banner');
        Storage::delete(Auth::user()->banner);
        Auth::user()->banner = $p;
        Auth::user()->save();

        $posts = Video::query()->select('views')->where("user_id", "=", Auth::user()->id)->get();
        $nick = Auth::user()->nick;
        return redirect('/user/'.$nick.'/info')->with(['user' => Auth::user(),'views' => $posts,'correcte' => "Done Correctly"]);
    }

    /**
     * View user videos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $nick
     * @return \Illuminate\Http\Response
     */
    public function uservid(Request $request,$nick)
    {
        $user = User::where('nick',$nick)->first();
        if (isset($user)) {
            $posts = Video::query()->where("user_id", "=", "{$user->id}")->orderBy('created_at','DESC')->get();
            return view('user.videos')->with(['user' => $user, 'posts' => $posts]);
        } else {
            return view('user.videos')->with(['error' => "User not found!"]);
        }
    }

    /**
     * View user info.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $nick
     * @return \Illuminate\Http\Response
     */
    public function userinfo(Request $request,$nick)
    {
        $user = User::where('nick',$nick)->first();
        if (isset($user)) {

            $posts = Video::query()->select('views')->where("user_id", "=", "{$user->id}")->get();
            return view('user.info')->with(['user' => $user,'views' => $posts]);
        } else {
            return view('user.info')->with(['error' => "User not found!"]);
        }
    }

    /**
     * View user search.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $nick
     * @return \Illuminate\Http\Response
     */
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
     * User manage view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $nick
     * @return \Illuminate\Http\Response
     */
    public function uservidmanager(Request $request,$nick)
    {   
        $this->middleware('auth');
        $user = User::where('nick',$nick)->first();

        if (isset($user)) {
            $posts = Video::query()->where("user_id", "=", "{$user->id}")->orderBy('created_at','DESC')->get();
            return view('user.manage')->with(['user' => $user, 'posts' => $posts]);
        } else {
            return view('user.videos')->with(['error' => "User not found!"]);
        }
    }

    /**
     * View user recommendations.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $nick
     * @return \Illuminate\Http\Response
     */
    public function userecommendations(Request $request, $nick)
    {
        $this->middleware('auth');
        $user = User::where('nick',$nick)->first();

        if (isset($user)) {
            $posts = Video::query()->where("user_id", "=", "{$user->id}")->orderBy('created_at','DESC')->get();
            return view('user.recommendations')->with(['user' => $user, 'posts' => $posts]);
        } else {
            return view('user.videos')->with(['error' => "User not found!"]);
        }
        
    }
}
