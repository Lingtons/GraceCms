<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Lesson;
use Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

$posts = Post::orderBy('title', 'desc')->get();
		

        $params = [
            'title' => 'Posts',
			
            'posts' => $posts,
			
        ];
		

        return view('admin.posts.post_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       	$categories = Category::all();
		$params = [
            'title' => 'Create Post',
			'categories' => $categories,
        ];

        return view('admin.posts.post_create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts',
            'category' => 'required',
            'ddate' => 'required',
			'body' => 'required',
            'color' => 'required',
			'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			
        ]);

		$imageName = $this->storeImage($request);
        
		
        $new_post = Post::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category'),
            'ddate' => $request->input('ddate'),
			'body' => $request->input('body'),
            'color' => $request->input('color'),
			'avatar' => $imageName, 
        ]);

        return redirect()->route('posts.index')->with('success', "The Post <strong>$new_post->title</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
    
        $params = [
            'title' => 'View Post',
            'post' => $post,

        ];

        return view('admin.posts.post_view')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
$categories = Category::all();
        $params = [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => $categories,
        ];

        return view('admin.posts.post_edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                $post = Post::find($id);

        if (!$post){
            return redirect()
                ->route('posts.index')
                ->with('warning', 'The post you requested for has not been found.');
        }

        $this->validate($request, [
            'title' => 'required|unique:posts,title,'.$id,
            'body' => 'required',
            'category' => 'required',
            'ddate' => 'required',
            'color' => 'required',
            
        ]);

        $post->title = $request->input('title');
        
        $post->body = $request->input('body');
        $post->category_id = $request->input('category');
        $post->ddate = $request->input('ddate');
        $post->color = $request->input('color');
        $post->save();

        return redirect()->back()->with('success', "The post <strong>$post->title</strong> has successfully been updated.");

    }
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $post = Post::find($id);

        if (!$post){
            return redirect()
                ->route('posts.index')
                ->with('warning', 'The post you requested for has not been found.');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', "The Post <strong>$post->name</strong> has successfully been archived.");
    }
	
	
		public function post_lesson_create ($id)
    {
		
			$post = Post::find($id);

			$params = [
            'title' => 'Add Lesson to Post',
			'post_id' => $id,
			'post' => $post,
        ];

        return view('admin.posts.post_lesson_create')->with($params);        

		
    }
	
		public function update_avatar(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post){
            return redirect()
                ->route('posts.index')
                ->with('warning', 'The post you requested for was not found.');
        }

        $this->validate($request, [
           'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			
        ]);

        $imageName = $this->storeImage($request);

		$post->avatar = $imageName;
		$post->save();

        return redirect()->back()->with('success', "Post picture was successfully updated.");
    }

                private function storeImage($request)
    {
        $image = $request->file('avatar');
        if ($image) {
            $image_name = time().'.'.$request->avatar->getClientOriginalExtension();
            Image::make($image)->resize(400, 200)->save(public_path('images/'.$image_name));
            return $image_name;
        }
        return null;
    }
	
	

}
