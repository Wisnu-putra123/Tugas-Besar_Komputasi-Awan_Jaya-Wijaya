<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function indedx(){
        return view('index');
    }
}
