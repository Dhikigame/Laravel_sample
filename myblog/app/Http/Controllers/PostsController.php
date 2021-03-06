<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index() {
        $posts = \App\Post::all();
        //$posts = Post::orderBy('created_at', 'desc')->get();
        //$posts = Post::latest()->get();
        //dd($posts->toArray());
        return view('posts.index')->with('posts', $posts);
    }
    public function show(Post $post) {
        // $post = Post::find($id);
        // $post = Post::findOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    public function create() {
        return view('posts.create');
    }

    //フォームから送信されたデータはRequest型で受け取る
    public function store(Request $request) {
        //バリデーションの設定でtitleに3文字以上かつbodyに文字が含まれているか調べ、なければerrorsにエラーメッセージが格納
        $this->validate($request, [
            'title' => 'required|min:3',
            'body' => 'required'
          ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        //Modelにタイトルと内容のデータが保存され、indexにそのままリダイレクト
        return redirect('/');
    }

    public function edit(Post $post) {
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, Post $post) {
        $this->validate($request, [
          'title' => 'required|min:3',
          'body' => 'required'
        ]);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
      }

    public function destroy(Post $post) {
        $post->delete();
        return redirect('/');
    }
}