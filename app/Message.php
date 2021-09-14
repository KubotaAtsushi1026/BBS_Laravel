<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    // 入力チェック
    public function validate(){
        
         // エラー配列を空で作成
        $errors = array();
        
        // 名前が入力されていなければ
        if($this->name === null){
            $errors[] = '名前を入力してください';
        }
        // タイトルが入力されていなければ
        if($this->title === null){
            $errors[] = 'タイトルを入力してください';
        }
        // 本文が入力されていなければ
        if($this->body === null){
            $errors[] = '本文を入力してください';
        }
        // 画像が選択されていなければ
        if($this->image === null){
            $errors[] = '画像を選択してください';
        }
        
        // エラー配列を返す
        return $errors;
    }
}
