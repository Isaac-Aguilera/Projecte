@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 100px;">
 
    <div class="row">
        <div class="col-2 shadow fixed-top w-100" style="margin-top: 60px; position:fixed;height:100%;">
            <div class="d-flex flex-column flex-shrink-0 bg-light" >
                <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                  <li class="nav-item">
                      <h1 class="border-bottom">
                            <button style="background: none;
                            color: inherit;
                            border: none;
                            padding: 0;
                            font: inherit;
                            cursor: pointer;
                            outline: inherit;">
                                <i class="bi bi-camera-fill mx-auto"></i>
                            </button>
                      </h1>
                                        
                  </li>
                  <li>
                      <h1>
                          <button style="background: none;
                          color: inherit;
                          border: none;
                          padding: 0;
                          font: inherit;
                          cursor: pointer;
                          outline: inherit;">
                            <i class="bi bi-mic-fill mx-auto"></i>
                          </button>
                      </h1>        
                  </li>
                </ul>
                
              </div>
        </div>
    </div>
</div>
@endsection
