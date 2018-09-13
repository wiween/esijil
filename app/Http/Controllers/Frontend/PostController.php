<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::where('source', 'dalaman')->orderBy('id', 'desc')->get();
        return view('post.index', compact('posts'));
    }

    public function company()
    {
        //
        $posts = Post::where('source', 'syarikat')->orderBy('id', 'desc')->get();
        return view('post.company', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $certificate = Certificate::where('id', $id)->first();
        return view('post.create', compact('certificate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, $id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        if ($request->input('received') == 'N') {
            $certificate->current_status = 'telah dipos';
        }
        else if ($request->input('received') == 'Y'){
            $certificate->current_status = 'telah diterima';
        }
        else {
            $certificate->current_status = 'dalam proses percetakan';
        }
        $certificate->save();

        $post = new Post();
        $post->date_post = $request->input('date_post');
        $post->date_receive = $request->input('date_receive');
        $post->tracking_number = $request->input('tracking_number');
        $post->post_company = $request->input('post_company');
        $post->receiver = $request->input('receiver');
        $post->flag_received = $request->input('received');
        $post->remark = $request->input('remark');
        $post->certificate_id = $id;

        if ($post->save()) {
            return redirect('post')->with('successMessage', 'Maklumat Pos Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat pos. Sila hubungi Admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }


}
