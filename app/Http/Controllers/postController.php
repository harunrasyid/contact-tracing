<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
        $posts = \App\Models\post::all();
        return view('admin.post.index', ['posts' => $posts]);
    }

    public function showPost($id)
    {
        $post = \App\Models\post::find($id);
        return view('admin.post.showPost', ['post' => $post]);
    }

    public function addPost()
    {
        return view('admin.post.addPost');
    }

    public function createPost(Request $request)
    {
        //validasi
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ]); 

        $post = new \App\Models\post();
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return redirect('/admin/posts');
    }

    public function editPost($id)
    {
        $post = \App\Models\post::find($id);
        return view('admin.post.editPost', ['post' => $post]);
    }

    public function updatePost($id, Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ]); 

        $post = \App\Models\post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return redirect('/admin/posts');
    }

    public function deletePost($id)
    {
        $post = \App\Models\post::find($id)->delete();
        return redirect('/admin/posts');
    }

    public function postIndex()
    {
        $posts = \App\Models\post::latest()->get();
        return view('postIndex', ['posts' => $posts]);
    }

    public function postShow($id)
    {
        $post = \App\Models\post::find($id);
        return view('postShow', ['post' => $post]);
    }
}
