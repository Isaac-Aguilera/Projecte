<?php

namespace App\Http\Controllers;

use App\Models\Producte;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProducteController extends Controller
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
        return view('producte.create')->with('categories', Categoria::orderBy('name')->get());
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
            'category_id' => ['required','integer'],
            'name' => ['required','string','min:5','max:255'],
            'description' => ['required','min:5'],
            'image' => ['required','image', 'dimensions:min_width=200,min_height=200'],
            'preu' => ['required','integer'],
            'prod_url' => ['required','string','min:5'],
            
        ])->validate();
        
        $i = $data['image']->store('images');
        $data['image'] = $i;
        $producte = new Producte($data);
        $producte->save();
        
        
        
        return redirect()->route('pujarProducte')->with(['message' => 'Product created correctly']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producte  $producte
     * @return \Illuminate\Http\Response
     */
    public function show(Producte $producte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producte  $producte
     * @return \Illuminate\Http\Response
     */
    public function edit(Producte $producte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producte  $producte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producte $producte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producte  $producte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producte $producte)
    {
        //
    }
}
