<?php

namespace App\Http\Controllers;

use App\Models\Gamer;
use App\Models\Winner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $request){
        $nick = $request->cookie('nick');
        $gamers = Gamer::with('wins')->get();

        return view('home',['nick' => $nick, 'gamers'=>$gamers]);
    }

}
