<?php

namespace App\Http\Controllers;

use App\Models\Vot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotController extends Controller
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
        $video_id = $request->all()['id'];
        $user_id = Auth::user()->id;
        $vot = Vot::all()->where('user_id', '=', $user_id)->where('video_id', '=', $video_id)->first();
        if (!isset($vot)) {
            $vot = new Vot();
            $vot->user_id = $user_id;
            $vot->video_id = $video_id;
        }
        if ($request->all()['votacio'] == 'like') {
            $vot->votacio = 1;
        } else {
            $vot->votacio = 0;
        }
        $vot->save();
        return array( 
            'likes' => $vot->video->vots->where('votacio', '=', 1)->count(), 
            'dislikes' => $vot->video->vots->where('votacio', '=', 0)->count()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vot  $vot
     * @return \Illuminate\Http\Response
     */
    public function show(Vot $vot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vot  $vot
     * @return \Illuminate\Http\Response
     */
    public function edit(Vot $vot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vot  $vot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vot $vot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vot  $vot
     * @param  \Illuminate\Http\Request  $request
     */
    public function destroy(Request $request)
    {
        $video_id = $request->all()['id'];
        $user_id = Auth::user()->id;
        $vot = Vot::all()->where('user_id', '=', $user_id)->where('video_id', '=', $video_id)->first();
        $vot->delete();
        return array( 
            'likes' => Vot::all()->where('video_id', '=', $video_id)->where('votacio', '=', 1)->count(), 
            'dislikes' => Vot::all()->where('video_id', '=', $video_id)->where('votacio', '=', 0)->count()
        );
    }
}
