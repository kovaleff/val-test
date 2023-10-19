<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Gamer;
use App\Models\Winner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GameController extends Controller
{
    function newGame(Request $request){
        //todo validate
        if($nick = $request->input('nick')){
            Gamer::create([
                'nick' => $nick
            ]);
        } else{
            $nick = $request->cookie('nick');
        }
        $latestGame = Game::latest()->first();
        if($latestGame->is_finished){
            $latestGame = new Game;
            $latestGame->state = [0,0,0,0,0,0,0,0,0];
            $latestGame->is_finished = false;
            $latestGame->save();
        }

        if($latestGame->gamers->count() > 2){
            return redirect()->route('home')->with('message', 'Только двое!');
        };

        $gamerId = Gamer::where('nick', $nick)->firstOrFail()->id;
        $latestGame->gamers()->attach($gamerId);

        return redirect()->route('game', ['id' => $latestGame->id, 'gamerId' => $gamerId ])->withCookie(cookie('nick', $nick, 60*24*355));
    }

    function game(Request $request){
        $gameId = Game::latest()->first()->id;
        $gamerId =  $request->get('gamerId');
        $nick = Gamer::findOrFail($gamerId)->nick;

        return view('game', ['id' => $gameId, 'gamerId'=>$gamerId, 'nick' => $nick]);
    }

    function setState(Request $request){
        $game = Game::latest()->first();
        if(!$game->is_finished){
            $game->state =  $request->input('state');
            $game->save();
        }
    }

    function getState(){
        return $game = Game::latest()->first()->state;
    }
    function finish(Request $request){
        $gamerFinishedId = $request->input('gamerFinishedId');
        $game = Game::latest()->first();
        $game->is_finished = true;
        $game->save();

        $winner = Winner::create([
            'game_id' => $game->id,
            'winner_id' => $gamerFinishedId
        ]);
        dd($winner);
    }

}
