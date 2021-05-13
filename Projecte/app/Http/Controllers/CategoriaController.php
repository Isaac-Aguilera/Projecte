<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Video;
use Illuminate\Support\Str;
use App\Helpers\FormatTime;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $a = "";
        if($request['id'] == 0){
            $videos = Video::orderBy('created_at','DESC')->get();
        } else {
            $videos = Video::orderBy('created_at','DESC')->where("categoria_id", "=" , $request['id'])->get();
        }
        foreach($videos as $video) {
            $a = $a.'<div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card mb-4 shadow">
                    <a href="'.route('video', $video->id).'">
                        <video class="miniaturas w-100 p-0 m-0"  src="/'.$video->video_path.'" poster="/'.$video->image.'"  onmouseover="bigImg(this)" onmouseout="normalImg(this)" loop preload="none" muted="muted"></video>
                    </a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <a href="'.route('user', $video->user->nick).'">
                                    <img class="mr-1"
                                        style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;"
                                        src="/'.$video->user->image.'">
                                </a>

                            </div>
                            <div class="col-9">
                                <strong><span title="'.$video->title.'">
                                        '.Str::of($video->title)->limit(57, ' ...').'
                                    </span></strong><br>


                                <span class="text-muted">'.$video->user->nick.'</span><br>
                                <span class="text-muted">'.$video->views.' views</span><br>
                                <span class="text-muted">
                                    '.FormatTime::LongTimeFilter($video->created_at).'
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>';
        }
        if($a == "") {
            return "<h4>There are no videos of the selected category!</h4>";
        } else {
            return $a;
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
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
