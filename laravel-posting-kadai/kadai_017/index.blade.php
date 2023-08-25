@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')
    @if (session('flash_message'))
        <p class="text-success">{{ session('flash_message') }}</p>
    @endif

    <div class="mb-2">
        <a class="text-decoration-none" href="{{ route('posts.create') }}">新規投稿</a>
    </div>
    {{-- コントローラから受け取った変数$postsの中身を1つずつ取り出して表示 --}}
    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title fs-5">{{ $post->title }}</h2>
                <p class="card-text">{{ $post->content }}</p>
                {{-- 投稿日時を表示する --}}
                <p>{{ $post->created_at }}</p>

                <div class="d-flex">
                    <a class="btn btn-outline-primary d-block me-1" href="{{ route('posts.show', $post) }}">詳細</a>
                    <a class="btn btn-outline-primary d-block me-1" href="{{ route('posts.edit', $post) }}">編集</a>

                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger" type="submit">削除</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
