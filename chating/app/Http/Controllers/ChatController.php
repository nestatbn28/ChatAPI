<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftarchat($id)
    {
        $daftar =  DB::table('user as pen')->join('chat', 'chat.penerima', '=', 'pen.id')
        ->join('user as peng', 'chat.pengirim', '=', 'peng.id')
        ->select('chat.message','chat.penerima','pen.nama as penerima')
        ->where('chat.pengirim','=',$id)
        ->groupBy('chat.penerima')
        ->get();
        return response()->json([
            "success" => true,
            "message" => "List Chat",
            "result" =>  $daftar
            ]);
    }

    public function daftarpercakapan($id,$tujuan)
    {
        $daftar =  DB::table('user as pen')->join('chat', 'chat.penerima', '=', 'pen.id')
        ->join('user as peng', 'chat.pengirim', '=', 'peng.id')
        ->select('chat.message','pen.nama as penerima')
        ->where('id','=',3)
        ->get();
        return response()->json([
            "success" => true,
            "message" => "List Percakapan",
            "result" =>  $daftar
            ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function kirim(Request $request)
    {
        $chat = new Chat();
        $chat->message = $request->message;
        $chat->status = '0';
        $chat->pengirim = $request->pengirim;
        $chat->penerima = $request->penerima;
        if($chat->save()){
            return response()->json([
                "success" => true,
                "message" => "Pesan berhasil dikirim.",
                ]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
