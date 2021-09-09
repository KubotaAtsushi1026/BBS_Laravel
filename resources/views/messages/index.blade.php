@extends('layouts.app')
@section('title', '簡易掲示板')
@section('header', '投稿一覧')
@section('content')
            <div class="row mt-2">
                @if(count($messages) !== 0) 
                <table class="col-sm-12 table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>ユーザ名</th>
                        <th>タイトル</th>
                        <th>内容</th>
                        <th>投稿時間</th>
                    </tr>
                    </tr>
                    @foreach($messages as $message)
                    <tr>
                        <td><a href="/messages/{{ $message->id }}">{{ $message->id }}</a></td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->title }}</td>
                        <td>{{ $message->body }}</td>
                        <td>{{ $message->created_at }}</td>
                    </tr>
                    @endforeach
                </table>
                @else
                <p>データ一件もありません。</p>
                @endif
            </div>
            <div class="row mt-5">
                <a href="/messages/create" class="btn btn-primary">新規投稿</a>
            </div> 
        </div>
@endsection