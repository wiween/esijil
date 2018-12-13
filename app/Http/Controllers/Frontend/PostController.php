<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Certificate;
use Auth;
use DB;
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
        $posts = Post::join('certificates', 'posts.certificate_id', '=', 'certificates.id')->where('certificates.source', 'syarikat')->groupBy('certificates.batch_id')->get();
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
        $post->icno_receiver = $request->input('icno_receiver');
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

    public function search()
    {
        //
        return view('post.search');
    }

    public function searchResult(Request $request)
    {
        //
        $a = $request->input('ic_number');
        $b = $request->input('batch');
        //dd ($a);
        if ($request->has('ic_number') && $request->filled('ic_number')) {

            $post = Post::join('certificates', 'posts.certificate_id', '=', 'certificates.id')->where('certificates.source', 'dalaman')->where('certificates.ic_number', 'like', '%' . $a . '%')->count();

            if ($post <= 0) {
                $certificates = Certificate::where('ic_number', 'like', '%' . $a . '%')->
                where('flag_printed', 'Y')->where('source', 'dalaman')->get();
                //dd ($certificates);

                return view('post.result', compact('certificates'));
            } else {

                $certificates = "tiada";
                return view('post.result', compact('certificates'));

            }

        }

        if ($request->has('batch') && $request->filled('batch')) {

            $post = Post::join('certificates', 'posts.certificate_id', '=', 'certificates.id')->where('certificates.batch_id', $b)->where('certificates.source', 'dalaman')->count();

            if ($post <= 0) {
                $certificates = Certificate::select('batch_id', 'type', DB::raw("count(id) as jumlahstudent"))->where('batch_id',$b)
                    ->where('flag_printed', 'Y')->groupBy('batch_id')->where('source', 'dalaman')->get();
                //dd ($certificates);
                return view('post.result_post', compact('certificates'));
            } else {

                $certificates = "tiada";
                return view('post.result_post', compact('certificates'));

            }


        }
    }


    public function searchList($batch, $type)
    {
        //
        $certificates = Certificate::where('flag_printed', 'Y')
            ->where('batch_id', $batch)->where('type', $type)->orderBy('id', 'desc')->get();
        //dd($certificates);
        return view('post.search-list', compact('certificates'));
    }


    public function createBatch()
    {
        //
//        $certificate = Certificate::where('batch_id', $batch)->first();
        return view('post.create_postbatch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBatch(Request $request, $batch)
    {
        //
        $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->get();

        foreach($certificates as $certificate) {

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
            $post->tracking_number = $request->input('tracking_number');
            $post->date_post = $request->input('date_post');

            $post->flag_received = $request->input('received');
            $post->post_company = $request->input('post_company');
            $post->date_receive = $request->input('date_receive');
            $post->receiver = $request->input('receiver');
            $post->icno_receiver = $request->input('icno_receiver');
            $post->source = 'dalaman';

            $post->remark = $request->input('remark');
            $post->certificate_id = $certificate->id;
            $post->save();
        }


        if ($post->save()) {
            return redirect('/post/search')->with('successMessage', 'Maklumat Pos Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat pos. Sila hubungi Admin');
        }

    }

    public function listDoneBatch()
    {
        //
        $posts = Post::join('certificates', 'posts.certificate_id', '=', 'certificates.id')->where('certificates.source', 'dalaman')->groupBy('certificates.batch_id')->get();
        return view('post.list-done', compact('posts'));
    }

    public function editPost($id)
    {
        //
        $post = Post::where('certificate_id', $id)->first();
        return view('post.repost', compact('post'));
    }

    public function editPostBatch($id)
    {
        //
        $post = Post::where('tracking_number', $id)->firstOrFail();
        return view('post.repost-batch', compact('post'));
    }

    public function updatePost(Request $request, $id)
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

        $post = Post::where('certificate_id',$id)->first();
        $post->tracking_number = $request->input('tracking_number');
        $post->date_post = $request->input('date_post');

        $post->flag_received = $request->input('received');
        $post->date_receive = $request->input('date_receive');
        $post->post_company = $request->input('post_company');
        $post->receiver = $request->input('receiver');
        $post->icno_receiver = $request->input('icno_receiver');
        $post->source = 'dalaman';

        $post->remark = $request->input('remark');
        $post->certificate_id = $id;

        if ($post->save()) {
            return redirect('/post/batch')->with('successMessage', 'Maklumat Pos Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat pos. Sila hubungi Admin');
        }

    }

    public function updatePostBatch(Request $request, $id)
    {
        //
//        id adalah trackking number
        $certificates = Certificate::join('posts', 'certificates.id', '=', 'posts.certificate_id')
            ->where('posts.tracking_number', $id)->where('flag_printed', 'Y')->get();
//        dd ($certificates);

        foreach($certificates as $certificate) {
//            dd($certificate);
//            echo $request->input('received');
//            exit();
            if ($request->input('received') == 'N') {

                $certificate->current_status = 'telah dipos';

            } else if ($request->input('received') == 'Y') {
                $certificate->current_status = 'telah diterima';
            } else {
                $certificate->current_status = 'dalam proses percetakan';
            }

            $certificate->save();

        }

        $posts = Post::where('tracking_number',$id)->get();

        foreach($posts as $post) {
            $post->tracking_number = $request->input('tracking_number');
            $post->date_post = $request->input('date_post');

            $post->flag_received = $request->input('received');
            $post->post_company = $request->input('post_company');
            $post->date_receive = $request->input('date_receive');
            $post->receiver = $request->input('receiver');
            $post->icno_receiver = $request->input('icno_receiver');
            $post->source = 'dalaman';

            $post->remark = $request->input('remark');
//                $post->certificate_id = $certificate->id;
            $post->save();
        }

        if ($post->save()) {
            return redirect('/post/batch')->with('successMessage', 'Maklumat Pos Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat pos. Sila hubungi Admin');
        }

    }

    public function detailStudentPost($batch)
    {
        //
//        $posts = Post::where('source', 'syarikat')->orderBy('id', 'desc')->get();
        $posts = Post::join('certificates', 'posts.certificate_id', '=', 'certificates.id')->where('certificates.source', 'dalaman')->where('batch_id', $batch)->orderBy('name', 'asc')->get();
        return view('post.post-batchdetail', compact('posts'));
    }





}
