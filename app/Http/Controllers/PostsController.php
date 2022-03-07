<?php

 

namespace App\Http\Controllers;

 
use App\Http\Requests\StorePost as RequestsStorePost;
use App\Models\BlogPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

 

class PostsController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth')
        ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()

    {

        //DB::connection()->enableQueryLog();

 

        // $posts = BlogPost::all();

        //$posts = BlogPost::with('comments')->get();

 

        //foreach ($posts as $post) {

            //foreach ($post->comments as $comment) {

                //echo $comment->content;

            //}

        //}

 

        //dd(DB::getQueryLog());

 

        $posts = BlogPost::all();

        return view('posts.index', ['posts'=> $posts]);

    }

 

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('posts.create');

    }

 

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(RequestsStorePost $request)

    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

 

        $post = BlogPost::create($validated);

 

        // $post = new BlogPost();

 

        // $post->title = $validated['title'];

        // $post->content = $validated['content'];

 

        // $post->save();

 

        $request->session()->flash('status', 'Blog Post Telah Berhasil disimpan !');

 

        return redirect()->route('posts.show', ['post'=> $post->id]);

    }

 

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $post =  BlogPost::findOrFail($id);

        return view('posts.show', ['post'=> $post]);

    }

 

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $post   = BlogPost::findOrFail($id);

        if(Gate::denies('posts.update', $post)){
        abort('403', 'Anda tidak diizinkan untuk melakukan update post ini!');

    }

 

    return view('posts.edit', ['post'=> $post]);

    }

 

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(RequestsStorePost $request, $id)

    {

        $post = BlogPost::findOrFail($id);

        if(Gate::denies('posts.update', $post)){
            abort('403', 'Anda tidak diizinkan untuk melakukan update post ini!');
        }
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();

 
        $request->session()->flash('status', 'Blog Post Telah Berhasil diupdate !');

 

        return redirect()->route('posts.show', ['post'=> $post->id]);

    }

 

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $post = BlogPost::findOrFail($id);
       // $this->authorize('delete-post', $post);
        if(Gate::denies('posts.delete', $post)){

        abort('403', 'Anda tidak diizinkan untuk melakukan update post ini!');
    }
        $post->delete();

 

        session()->flash('status', 'Blog Post Telah Berhasil dihapus !');

 

        return redirect()->route('posts.index');

    }

}