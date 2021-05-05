<?php

namespace App\Http\Controllers;

use App\Models\Valoracio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValoracioController extends Controller
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
        $video_id = $request->all()['video_id'];
        $user_id = Auth::user()->id;
        $name = $request->all()['name'];
        $valor = $request->all()['votacio'];
        $valoracio = Valoracio::all()->where('user_id', '=', $user_id)->where('video_id', '=', $video_id)->where('name', '=', $name)->first();
        if (!isset($valoracio)) {
            $valoracio = new Valoracio();
            $valoracio->user_id = $user_id;
            $valoracio->video_id = $video_id;
            $valoracio->name = $name;
            $valoracio->valoracio = $valor;
        } else {
            $valoracio->valoracio = $valor;
        }
        $valoracio->save();

        $mitjanes = array();
        $valoracions = Valoracio::all()->where('video_id', '=', $video_id)->groupBy('name');
        foreach($valoracions as $nom => $name) {
            $contador = 0;
            $suma = 0;
            foreach($name as $id => $valoracio) {
                $contador = $contador + 1;
                $suma = $suma + $valoracio['valoracio'];
            }
            $mitjanes[$nom] = $suma / $contador;
        }
        return array( 
            'mitjanes' => $mitjanes
            
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Valoracio  $valoracio
     * @return \Illuminate\Http\Response
     */
    public function show(Valoracio $valoracio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Valoracio  $valoracio
     * @return \Illuminate\Http\Response
     */
    public function edit(Valoracio $valoracio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Valoracio  $valoracio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valoracio $valoracio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $video_id = $request->all()['video_id'];
        $user_id = Auth::user()->id;
        $name = $request->all()['name'];
        $valoracio = Valoracio::all()->where('user_id', '=', $user_id)->where('video_id', '=', $video_id)->where('name', '=', $name)->first();
        $valoracio->delete();
        
        $mitjanes = array();
        $valoracions = Valoracio::all()->where('video_id', '=', $video_id)->groupBy('name');
        foreach($valoracions as $nom => $name) {
            $contador = 0;
            $suma = 0;
            foreach($name as $id => $valoracio) {
                $contador = $contador + 1;
                $suma = $suma + $valoracio['valoracio'];
            }
            $mitjanes[$nom] = $suma / $contador;
        }
        return array( 
            'mitjanes' => $mitjanes
            
        );
    }
}
