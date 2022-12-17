<?php

namespace App\Http\Controllers;

use App\Carrusel;
use Illuminate\Http\Request;

class CarruselController extends Controller
{
    //
    public function index(){

        //Get news update
        $Carrusel = Carrusel::all();
        return view('Carrusel.index',compact('Carrusel'));
    }
}
