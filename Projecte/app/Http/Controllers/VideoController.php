<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\User;
use App\Models\Valoracio;
use App\Jobs\UploadVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use FFMpeg;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $video = Video::find($request->route('id'));
        if (isset($video)) {
            $video->increment('views',1);
            return view('video.detall')->with(['video' => $video,'valoracions' => Valoracio::all()->where('video_id', '=', $video->id)->groupBy('name')]);
        } else {
            return view('video.detall')->with(['error' => "Video not found!"]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!isset(Auth::user()->id)) {
            return redirect('login');
        }
        return view('video.create')->with('categories', Categoria::orderBy('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            'video_path' => ['required', 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm'],
            'title' => ['required','string','min:5','max:255'],
            'description' => ['required','min:5'],
            'image' => ['required','image', 'dimensions:min_width=200,min_height=200'],
            'categoria_id' => ['required','integer'],
        ])->validate();
        
        $f = $request->file('video_path');

        $p = $f->store('videos');
        
        $data['video_path'] = $p;
        $i = $data['image']->store('miniaturas');
        $data['image'] = $i;
        if ($f->extension() != "webm") {

            $job = new UploadVideo($data);
            $this->dispatch($job);

           
        }else {
            $video = new Video($data);
            $video->save();
        }
        
        return redirect()->route('pujarVideo')->with(['message' => 'Video upload correctly']);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (!isset(Auth::user()->id)) {
            return redirect('login');
        }
        $video = Video::find($request->route('id'));
        if (isset($video)) {
            $video->increment('views',1);
            return view('video.edit')->with('video' , $video)->with('categories', Categoria::orderBy('name')->get());
        } else {
            return view('video.edit')->with(['error' => "Video not found!"]);
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
        $this->middleware('auth');
        $video = Video::find($request->route('id'));
        $data = $request->all();
        Validator::make($data, [
            'title' => ['required','string','min:5','max:255'],
            'description' => ['required','min:5'],
            'image' => ['image', 'dimensions:min_width=200,min_height=200'],
            'categoria_id' => ['required','integer'],
        ])->validate();
        if(isset($data['image'])) {
            $i = $data['image']->store('miniaturas');
            Storage::delete($video->image);
            $data['image'] = $i;
        }
        $video->update($data);
        return redirect()->route('editarVideo', $video->id)->with(['message' => 'Video edited correctly!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->route('id');
        $video = Video::find($id);
        if(Auth::user()->id == $video->user_id) {
            Storage::delete($video->video_path);
            Storage::delete($video->image);
            $video->delete();
        }
    }

    /**
     * Find the search.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        if(User::where('nick', 'LIKE', "%{$search}%")->first()) {
            $user = User::where('nick', 'LIKE', "%{$search}%")->first();

            $id = $user->id;
            $username = User::where('nick','LIKE','%'.$search.'%');
            $posts = Video::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('user_id', 'LIKE', "%{$id}%")
            ->orderBy('views','DESC')
            ->get();
        }else {
            $posts = Video::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orderBy('views','DESC')
            ->get();
        }
    
        // Return the search view with the resluts compacted
        return view('video.search')->with('videosearch' , $posts);
    }
}