<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producte;
use Illuminate\Support\Str;
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
             $productes = Producte::orderBy('created_at','DESC')->get();
         } else {
             $productes = Producte::orderBy('created_at','DESC')->where("category_id", "=" , $request['id'])->get();
         }
         foreach($productes as $producte) {
             $a = $a. '<div class="col-lg-4 col-md-6 col-sm-6">
             <div class="card mb-4 shadow">
                 <a href="'.route('producte', $producte->id).'">
                   <img class="card-img-top miniaturas" src="/'. $producte->image .'" alt="">
                 </a>
                 <div class="card-body d-flex flex-column">  
                     <p class="card-title font-weight-bolder" title="'. $producte->name .'">'. Str::of($producte->name)->limit(29, ' ...').'</p>
                     <div class="row">
                         <div class="col-12">
                             <p class="" title="'. $producte->description .'">'. Str::of($producte->description)->limit(170, ' ...').'</p>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <h4 class=" font-weight-bold">'. $producte->preu.'&euro;</h4>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer">
                     <div class="row">
                            <button onclick="window.location='. "$producte->prod_url" .'" class="btn btn-lg btn-block w-100 h-100 font-weight-bold" style="background-color:#ffa700; color: white;">
                                BUY IT NOW ON amazon.com <i class="fa fa-amazon"></i>
                            </button>
                     </div>
                 </div>
             </div>
         </div>';
             
         }
         if($a == "") {
             return "<div class='col-lg-12 col-md-12 col-sm-12'>
                <h4 class='alert alert-danger text-center'>There are no products of ".Categoria::find($request['id'])->name." category!</h4>
            </div>";
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
