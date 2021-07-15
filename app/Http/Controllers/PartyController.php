<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::all();

        if(!$parties){

            return response() ->json([
                'success' => false,
                'message' => 'Parties not found',
            ], 400);

        }

        return response() ->json([
            'success' => true,
            'data' => $parties,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request , [
            'name' => 'required',
            'game_id' => 'required',
        ]);

        $party = Party::create ([
            'name' => $request -> name,
            'game_id' => $request -> game_id,
        ]);

        if ($party) {

            return response() ->json([
                'success' => true,
                'data' => $party
            ], 200);
    
        }

        return response() ->json([
            'success' => false,
            'message' => 'Party not added',
        ], 500);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        //
    }
}
