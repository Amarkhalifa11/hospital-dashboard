<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
     
    public function index()
    {
        $posts = Post::latest()->paginate(3);
        return view('admin.posts.allposts',compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.addpost');
        
    }

    public function store(Request $request)
    {
        // 1 validation
        $validatedData = $request->validate([
            'post_title'      => 'required|unique:posts',
            'post_auther'     => 'required|unique:posts',
            'post_date'       => 'required|unique:posts',
            'post_image'      => 'required|image',
        ]
        ,
        [
            'post_title.required'  => 'type any  thing',
            'post_auther.required' => 'type any  thing',
            'post_date.required'   => 'type any  thing',
            'post_image.required'  => 'select image',

            'post_title.unique'  => 'repeated',
            'post_auther.unique' => 'repeated',
            'post_date.unique'   => 'repeated',
            'post_image.image'   => 'select image',

        ]);

        // 2

        $post_image = $request->file('post_image'); 
 
        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($post_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'images/posts/'; 
        $image = $upload_location.$img_name; 
        $post_image->move($upload_location,$img_name); 

        // 3 
        $posts = new Post();
        $posts->post_title   = $request->post_title;
        $posts->post_auther  = $request->post_auther;
        $posts->post_date    = $request->post_date;
        $posts->post_image   = $image;
        $posts->save();

        // 4 

        return redirect()->route('posts')->with('message' , 'the post is added');
    }

    public function show($post)
    {
        //
    }

    public function edit($id)
    {
        $posts = Post::find($id);
        return view('admin.posts.editpost' , compact('posts'));
    }

    public function update(Request $request, $id)
    {

        // 1
        $post_image = $request->file('post_image'); 
 
        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($post_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'images/posts/'; 
        $image = $upload_location.$img_name; 
        $post_image->move($upload_location,$img_name); 

        //2
        $posts = Post::find($id);
        $posts->update([
        'post_title'     => $request->post_title,
        'post_auther'    => $request->post_auther,
        'post_date'      => $request->post_date,
        'post_image'     => $image,
        ]);

        //3
        return redirect()->route('posts')->with('message' , 'the post is updated');
    }

    public function softDeletes($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect()->back()->with('message' , 'the post is deleted');
    }

    public function thedeleted() 
    {
        $posts = Post::onlyTrashed()->paginate(3);
        return view('admin.posts.trashed',compact('posts'));
        
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->find($id);
        $posts->restore();

        return redirect()->route('posts')->with('message' , 'the post is restored');

    }

    public function destroy($id)
    {
        $posts = Post::withTrashed()->find($id);
        $posts->forceDelete();

        return redirect()->back()->with('message' , 'the post is deleted');

    }
}
