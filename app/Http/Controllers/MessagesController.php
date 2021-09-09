<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Messageモデルを使って、MySQLのmessagesテーブルから全データ取得
        $messages = Message::all();
        
        // フラッシュメッセージにnull をセット
        $flash_message = null;
        // エラーメッセージにnullをセット
        $errors = null;
    
        // 連想配列のデータを3セット（viewで引き出すキーワードと値のセット）引き連れてviewを呼び出す
        return view('messages.index', compact('messages', 'flash_message', 'errors'));
        // dd('indexが呼ばれた');
        // index.php　というCに書いていた記述の移植
        // Messageモデルを使って、データを全件取得
        $messages = Message::all();
        
        return view('messages.index', ['messages' => $messages, 'errors'=> null, 'flash_message' =>null]);
        // return view('messages.index', ['messages' => $messages, 'flash_message' => $flash_message, 'errors' => $errors]);

        // include_once 'xxx_view.php';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('createが呼ばれた');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
