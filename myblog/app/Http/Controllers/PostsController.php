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
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        //Modelにタイトルと内容のデータが保存され、indexにそのままリダイレクト
        return redirect('/');
      }
}