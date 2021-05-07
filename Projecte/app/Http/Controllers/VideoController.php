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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $video = Video::find($request->route('id'));
        if (isset($video)) {
            $video->increment('views',1);
            return view('video.detall')->with(['video' => $video,'valoracions' => Valoracio::all()->where('video_id', '=', $video->id)->groupBy('name')]);
        } else {
            return view('video.detall')->with(['error' => "No s'ha pogut trobar el video!"]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        
        
        return redirect()->route('pujarVideo')->with(['message' => 'Video penjat correctament']);


    }

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


        // Search in the title and body columns from the posts table
    
        // Return the search view with the resluts compacted
        return view('video.search')->with('videosearch' , $posts);
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
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Storage::disk('videos')->delete($video->video_path);
        $video->delete();
    }
}