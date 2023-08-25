<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// やりとりするモデルを宣言する
use App\Models\Post;
use User;

class PostController extends Controller
{
    // 一覧ページ
    public function index()
    {
        // postsテーブルの全データを古い順で取得する
        $posts = Post::oldest()->get();
        // 変数$postsをposts/index.blade.phpに渡す（$はつけない）
        return view('posts.index', compact('posts'));
    }

    // 作成ページ
    public function create()
    {
        return view('posts.create');
    }

    // 作成機能
    public function store(Request $request)
    {
        // バリデーションを設定（文字数制限を追加）
        $request->validate([
            'title' => 'max:4|required',
            'content' => 'max:200|required',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.index')->with('flash_message', '投稿が完了しました。');
    }

    // 詳細ページ
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // 更新ページ
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 更新機能
    public function update(Request $request, Post $post)
    {
        // バリデーションを設定（文字数制限を追加）
        $request->validate([
            'title' => 'max:40|required',
            'content' => 'max:200|required',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->updated_at = $request->input('updated_at');
        $post->save();

        return redirect()->route('posts.show', $post)->with('flash_message', '投稿を編集しました。');
    }

    // 削除機能
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('flash_message', '投稿を削除しました。');
    }
}
