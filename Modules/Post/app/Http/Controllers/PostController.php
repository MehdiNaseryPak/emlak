<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Image\ImageUpload;
use Illuminate\Http\Request;
use Modules\Category\Models\Category;
use Modules\Post\Http\Requests\PostRequest;
use Hekmatinasser\Verta\Verta;
use Modules\Post\Models\Post;
use Nette\Utils\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->where('status',1)->get();
        return view('post::create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $published_at = $request->published_at ? Verta::parse($request->published_at)->datetime() : now();
        $image = ImageUpload::save($request->image,'post');
        Post::query()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $image,
            'cat_id' => $request->cat_id,
            'user_id' => 1,
            'published_at' => $published_at,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('post.index')->with('message','پست با موفقیت ایجاد شد');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::query()->where('status',1)->get();
        return view('post::edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post) {
        $published_at = $request->published_at ? Verta::parse($request->published_at)->datetime() : $post->published_at;
        if($request->hasFile('image'))
            $image = ImageUpload::save($request->image,'post');
        else
            $image = $post->image;
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $image,
            'cat_id' => $request->cat_id,
            'user_id' => 1,
            'published_at' => $published_at,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('post.index')->with('message','پست با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
