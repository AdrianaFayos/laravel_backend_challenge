<?php

namespace App\Http\Controllers;

use App\Models\PartyUser;
use Illuminate\Http\Request;

class PartyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if($user->id === 1){

            $partyuser = PartyUser::all();

            return response() ->json([
                'success' => true,
                'data' => $partyuser,
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

        $this->validate( $request , [
            'party_id' => 'required',
        ]);

        $check = PartyUser::where('party_id', '=', $request->party_id)->where('user_id', '=', $user->id)->get();

        if($check->isEmpty()) {

            $partyuser = PartyUser::create ([
                'user_id' => $user -> id,
                'party_id' => $request -> party_id,
            ]);
    
            if ($partyuser) {
    
                return response() ->json([
                    'success' => true,
                    'data' => $partyuser
                ], 200);
        
            }
    
            return response() ->json([
                'success' => false,
                'message' => 'Party-User not added',
            ], 500);
        }
        return response()->json([
            'success' => false,
            'message' => "You are already at the party"
        ], 200); 
    }

    public function byuser()
    {
        $user = auth()->user();

        $partyuser = PartyUser::where('user_id', '=', $user->id)->get();

        if($user->id){

            return response() ->json([
                'success' => true,
                'data' => $partyuser,
            ]);

        } else {

            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);

        }
    }

    public function byparty(Request $request)
    {
        $user = auth()->user();

        $partyuser = PartyUser::where('party_id', '=',  $request -> party_id)->get();

        if($user->id){

            return response() ->json([
                'success' => true,
                'data' => $partyuser,
            ]);

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
     * @param  \App\Models\PartyUser  $partyUser
     * @return \Illuminate\Http\Response
     */
    public function show(PartyUser $partyUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartyUser  $partyUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartyUser $partyUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartyUser  $partyUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = auth()->user();

        $check = PartyUser::where('party_id', '=',$request -> party_id)->where('user_id', '=', $user->id)->get();

        if( $check->isEmpty() ){
        
            return response()->json([
                'success' => false,
                'message' => "You are not at this party."
            ], 400); 

        } else {
            
            try{
                $check = PartyUser::selectRaw('id')
                ->where('party_id', '=', $request -> party_id)
                ->where('user_id', '=', $user->id)->delete();

                return response()->json([
                    'success' => true,
                    'messate' => "You have left the party"
                ], 200); 

            }catch(QueryException $err){
                return response()->json([
                    'success' => false,
                    'data' => $err
                ], 400); 
            }
        }
    }
}
