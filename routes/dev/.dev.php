<?php

use Illuminate\Support\Facades\Route;


Route::get("/dev", function(){
    return view('dev-mode.button-view');
});
