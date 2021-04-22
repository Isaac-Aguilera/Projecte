<?php

namespace App\Http\Controllers;

use App\Models\Vot;
use Illuminate\Http\Request;

class VotController extends Controller
{
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
        $vot = new Vot();
        $vot->user_id = $user_id;
        $vot->video_id = $video_id;
        if ($request->all()['votacio'] == 'like') {
            $resposta = 
            $vot->votacio = 1;
        } else {
            $vot->votacio = 0;
        }
        $vot->save();
        return { 
            'likes' => Vots::all()->where('video_id', '=', $video_id)->where('votacio', '=', 1)->count(), 
            'dislikes' => Vots::all()->where('video_id', '=', $video_id)->where('votacio', '=', 1)->count()
        };
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vot $vot)
    {
        //
    }
}
