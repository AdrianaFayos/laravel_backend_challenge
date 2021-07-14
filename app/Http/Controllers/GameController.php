<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $games = Game::all();

        if($user->id === 1){

            return response() ->json([
                'success' => true,
                'data' => $games,
            ]);

        } else {

            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = auth()->user();

        if($user->id === 1){

            $this->validate( $request , [
                'title' => 'required',
                'thumbnail_url' => 'required',
                'url' => 'required',

            ]);
    
            $game = Game::create ([
    
                'title' => $request -> title,
                'thumbnail_url' => $request -> thumbnail_url,
                'url' => $request -> url,
            ]);
    
            if($game){
    
                return response() ->json([
                    'success' => true,
                    'data' => $game
                ], 200);
    
            }
    
            return response() ->json([
                'success' => false,
                'message' => 'Game not added',
            ], 500);

        } else {

            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();

        if($user->id === 1){
            
            $game = Game::where('id', '=', $id)->get();

            if(!$game){
    
                return response() ->json([
                    'success' => false,
                    'message' => 'Game not found',
                ], 400);
    
            }
    
            return response() ->json([
                'success' => true,
                'data' => $game,
            ], 200);
    
        } else {
    
            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);
    
        }
             
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $user = auth()->user();

        if($user->id === 1){
            
            

        } else {

            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);

        }
    }
}
