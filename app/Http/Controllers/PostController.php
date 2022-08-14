<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    const DATA = [
            [ 'count'=> 4,    'label'=> "Departments"],
            [ 'count'=> 19,   'label'=> "Programs"],
            [ 'count'=> 221,  'label'=> "Research"],
            [ 'count'=> 378,  'label'=> "Publication"],
            [ 'count'=> 20,   'label'=> "Patents"],
            [ 'count'=> 1420, 'label'=> "Students"]
        ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = self::DATA;

        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts', 'data'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = self::DATA;

        return view('posts.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $newImageName = 'uploaded_' . uniqid() . "." . $image->getClientOriginalExtension();
            $image->move('image/', $newImageName);
            $input['image'] = "$newImageName";
        }

        Post::create($input);

        return redirect()->route('posts.index')
                         ->with('success','โพสต์สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = self::DATA;
        //return view('posts.show', ['post' => $post]);
        return view('posts.show', compact('post', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = self::DATA;
       //return view('posts.edit', ['post' => $post]);
       return view('posts.edit', compact('post', 'data'));
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
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        $input = $request->all();


        if ($image = $request->file('image')) {

            $newImageName = 'uploaded_' . uniqid() . "." . $image->getClientOriginalExtension();

            $image->move('image/', $newImageName);

            $input['image'] = "$newImageName";

        } else {

            unset($input['image']);

        }



        $post->update($input);



        return redirect()->route('posts.index')
                        ->with('success','โพสต์สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete('public/images/' . $post->image);
        $post->delete();

        return redirect('/post')->with([
            'message' => 'ลบสำเร็จ',
            'status' => 'success'
        ]);
    }
}
