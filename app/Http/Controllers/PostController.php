<?php

namespace App\Http\Controllers;

use App\Catogory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        $catogories = Catogory::all();
        return view('admin.post.list', compact('posts', 'catogories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catogories = Catogory::all();
        return view('admin.post.create', compact('catogories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $posts = new Post();
        $posts->title = $request->input('title');
        $posts->content = $request->input('content');
        $posts->user_id = $request->input('user_id');
        $posts->catogory_id = $request->input('catogory_id');
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->image;
                $clientName = $image->getClientOriginalName();
                $path = $image->move(public_path('upload/images'), $clientName);
                $posts->image = $clientName;
            }
        }

        $posts->save();
        Session::flash('success', 'Tạo mới bài viết thành công');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::findOrFail($id);
        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        $catogories = Catogory::all();
        return view('admin.post.edit', compact('posts', 'catogories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = $request->input('user_id');
        $post->catogory_id = $request->input('catogory_id');
        if ($request->hasFile('image')) {
            $currentImg = $post->image;
            if ($currentImg) {
                Storage::delete('upload/images', $currentImg);
            }
            $image = $request->image;
            $clientName = $image->getClientOriginalName();
            $path = $image->move(public_path('upload/images'), $clientName);
            $post->image = $clientName;
        }
        $post->save();
        Session::flash('success', 'Cập nhật bài viết thành công');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.post.index');
    }

    public function list()
    {
        $posts = new Post();
        return redirect()->route('admin.post.index', compact($posts));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.post.index');
        }
        $posts = Post::where('title', 'LIKE', '%' . $keyword . '%')->paginate(3);
        return view('admin.post.list', compact('posts'));
    }

    public function filterByCatogory(Request $request)
    {
        $idCatogory = $request->input('catogory_id');
        $catogoryFilter = Catogory::findOrFail($idCatogory);
        $posts = Post::where('catogory_id', $catogoryFilter->id)->get();
        $totalPostFilter = count($posts);
        $catogories = Catogory::all();

        return view('admin.post.list', compact('posts', 'catogories', 'totalPostFilter', 'catogoryFilter'));
    }
}
