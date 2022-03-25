<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function slug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }


    public function index()
    {
        return view('dashboard.posts.index', [
            'title' => 'Post',
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
                'title' => 'Create Post',
                'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $dataPost = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'unique:posts'],
            'category_id' => ['required'],
            'image' => 'image|file|max:1024',
            'body' => ['required']
        ]);

        if($request->file('image')){
            $dataPost['image'] = $request->file('image')->store('post-image');
        }

        $dataPost['user_id'] = auth()->user()->id;
        $dataPost['excerpt'] = Str::limit(strip_tags($request->body, 200));

        Post::create($dataPost);

        return redirect('/dashboard/posts')->with('success', 'Tambah data posts berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'title' => 'Detail Post',
            'post' => $post
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'title' => 'Edit Posts',
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'category_id' => ['required'],
            'image' => 'image|file|max:1024',
            'body' => ['required']
        ];

        if($request->slug !== $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }


        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->gambarLama){
                Storage::delete($request->gambarLama);
            }
            $validateData['image'] = $request->file('image')->store('post-image');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body, 200));


        Post::where('id', $post->id)->update($validateData);

        return redirect('/dashboard/posts')->with('success', 'Edit data posts berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if($post->image){
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Data Post Berhasil Dihapus!');
    }
    
}

