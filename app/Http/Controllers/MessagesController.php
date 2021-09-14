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
        
        // フラッシュメッセージをセッションから取得
        $flash_message = session('flash_message');
        // セッション情報の破棄
        session()->forget('flash_message');  
        // $flash_message = $_SESSION['flash_message'];
        // $_SESSION['flash_message'] = null;
        
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
        // 空のメッセージインスタンスを作成
        $message = new Message();
        
        // セッションにメッセージが保存されていれば
        if(session('message')){
            // セッションからメッセージ取得
            $message = session('message');
            // セッション情報の破棄
            session()->forget('message');
        }
        
        // フラッシュメッセージをnullにセット
        $flash_message = null;
        
        // エラーメッセージをセッションから取得
        $errors = session('errors');
        // セッション情報の破棄
        session()->forget('errors');
        
        
        // 連想配列のデータを3セット（viewで引き出すキーワードと値のセット）引き連れてviewを呼び出す
        return view('messages.create', compact('message', 'flash_message', 'errors'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $title = $request->input('title');
        $body = $request->input('body');
        // 画像ファイル情報の取得だけ特殊
        $file =  $request->image;
        
        // 画像ファイルが選択されていれば
        if ($file) { 
        
            // 現在時刻ともともとのファイル名を組み合わせてランダムなファイル名作成
            $image = time() . $file->getClientOriginalName();
            // アップロードするフォルダ名取得
            $target_path = public_path('uploads/');

        } else { // ファイルが選択されていなければ
            $image = null;
        }
        
        // 空のメッセージインスタンスを作成
        $message = new Message();
        
        // 入力された値をセット
        $message->name = $name;
        $message->title = $title;
        $message->body = $body;
        $message->image = $image;
        
        // 入力エラーチェック
        $errors = $message->validate();

        // 入力エラーが1つもなければ
        if(count($errors) === 0){
            // 画像アップロード処理
            $file->move($target_path, $image);
            
            // メッセージインスタンスをデータベースに保存
            $message->save();
            
            // セッションにflash_messageを保存
            // $_SESSION['flash_message'] =
            session(['flash_message' => '新規投稿が成功しました']);
            
            // indexアクションにリダイレクト
            return redirect('/');
            
        }else{
            // セッションに、入力したメッセージインスタンス と errors保存
            session(['errors' => $errors, 'message' => $message]);
            
            // createアクションにリダイレクト
            return redirect('/messages/create');
        }
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
