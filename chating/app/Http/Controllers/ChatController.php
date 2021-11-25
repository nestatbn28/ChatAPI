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
        ->select('chat.message','pen.nama as penerima','created_at')
        ->where('pengirim','=',$id)
        ->where('penerima','=',$tujuan)
        ->orWhere('pengirim','=',$tujuan)
        ->where('penerima','=',$id)
        ->orderBy('created_at')
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


    
}
