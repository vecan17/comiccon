<?php

namespace App\Http\Controllers;


use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //

     public function index(){
        $Game = Game::all();
        return view('Game.index',compact('Game'));
    }
}
