<?php

namespace App\Http\Controllers;

use App\Models\Comentari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComentariController extends Controller
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
        $request['user_id'] = Auth::user()->id;
        $data = $request->all();
        Validator::make($data, [
            'contingut' => ['string', 'max:500']
        ])->validate();
        $comentari = new Comentari($data);
        $comentari->save();
        $comentaris = $comentari->video->comentaris->count();
        
        return array('comentaris' => $comentaris,'id' => $comentari->id, 'nick' => $comentari->user->nick, 'image' => $comentari->user->image);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentari  $comentari
     * @return \Illuminate\Http\Response
     */
    public function show(Comentari $comentari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentari  $comentari
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentari $comentari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentari  $comentari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->route('id');
        $comentari = Comentari::find($id);
        $comentari->contingut = $request['contingut'];
        $comentari->save();

        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentari  $comentari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comentari $comentari)
    {
        $id = $request->route('id');
        $comentari = Comentari::find($id);
        $video = $comentari->video;
        $video_id = $video->id;
        $comentari->delete();
        
        $comentaris = $video->comentaris->count();
        return array('comentaris' => $comentaris);
    }
}
