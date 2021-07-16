<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $messages = Message::all();

        if($user->id === 1){

            return response() ->json([
                'success' => true,
                'data' => $messages,
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
            'message' => 'required',
            'party_id' => 'required',
        ]);

        $party = Message::create ([
            'message' => $request -> message,
            'user_id' => $user->id,
            'party_id' => $request -> party_id,
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();

        if($user->id === 1){
            
            $message = Message::where('user_id', '=', $id)->get();

            if(!$message){
    
                return response() ->json([
                    'success' => false,
                    'message' => 'Messages not found',
                ], 400);
    
            } else if ($message->isEmpty()) {
            
                return response() ->json([
                    'success' => false,
                    'message' => 'Messages not found',
                    ], 400);
    
            } 
    
            return response() ->json([
                'success' => true,
                'data' => $message,
            ], 200);
    
        } else {
    
            return response() ->json([
                'success' => false,
                'message' => 'You do not have permision.',
            ], 400);
    
        }
    }

    public function byparty($id)
    {
        $message = Message::where('party_id', '=', $id)->get();

        if(!$message){

            return response() ->json([
                'success' => false,
                'message' => 'Messages not found',
            ], 400);

        } else if ($message->isEmpty()) {
            
            return response() ->json([
                'success' => false,
                'message' => 'Messages not found',
                ], 400);

        }        
        return response() ->json([
            'success' => true,
            'data' => $message,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
