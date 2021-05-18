<?php

namespace App\Http\Controllers;

use App\Models\Producte;
use App\Models\Categoria;
use App\Models\User;
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
        $this->middleware('auth');
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
        $this->middleware('auth');

        $data = $request->all();
        Validator::make($data, [
            'category_id' => ['required','integer'],
            'name' => ['required','string','min:5','max:255'],
            'description' => ['required','min:5'],
            'image' => ['required','image', 'dimensions:min_width=200,min_height=200'],
            'preu' => ['required','numeric'],
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $producte = Producte::find($request->route('id'));
        if (isset($producte)) {
            return view('producte.detall')->with(['producte' => $producte])->with('categories', Categoria::orderBy('name')->get());
        } else {
            return view('producte.detall')->with(['error' => "Product not found!"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $this->middleware('auth');
        $producte = Producte::find($request->route('id'));
        if (isset($producte)) {
            return view('producte.edit')->with(['producte' => $producte])->with('categories', Categoria::orderBy('name')->get());
        } else {
            return view('producte.edit')->with(['error' => "Product not found!"]);
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

        $producte = Producte::find($request->route('id'));
        $data = $request->all();
        Validator::make($data, [
            'category_id' => ['required','integer'],
            'name' => ['required','string','min:5','max:255'],
            'description' => ['required','min:5'],
            'image' => ['image', 'dimensions:min_width=200,min_height=200'],
            'preu' => ['required','numeric'],
            'prod_url' => ['required','string','min:5'],
            
        ])->validate();
        if(isset($data['image'])) {
            $i = $data['image']->store('images');
            Storage::delete($producte->image);
            $data['image'] = $i;
        }
        $producte->update($data);
        
        return redirect()->route('editarProducte', $producte->id)->with(['message' => 'Product updated correctly']);

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
        $producte = Producte::find($id);
        if(Auth::user()->id == $producte->user_id) {
            Storage::delete($producte>image);
            $producte->delete();
        }
    }

    /**
     * Search the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        if(User::where('name', 'LIKE', "%{$search}%")->first()) {
            $user = User::where('name', 'LIKE', "%{$search}%")->first();

            $id = $user->id;
            $username = User::where('name','LIKE','%'.$search.'%');
            $posts = Producte::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('user_id', 'LIKE', "%{$id}%")
            ->get();
        }else {
            $posts = Producte::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
        }


        // Search in the title and body columns from the posts table
    
        // Return the search view with the resluts compacted
        return view('producte.search')->with('productesearch' , $posts);
    }
}
