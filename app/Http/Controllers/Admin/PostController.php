<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;     

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Authorizable;

class PostController extends Controller
{
    // use Authorizable;

    public function index() 
    {
        // dd($test);
        
        if(Auth::user()->roles->implode('name', ', ') == "Admin") 
        {
            $posts = Post::orderBy('id')->paginate(10);

        } else {
            $posts = Post::where('user_id', auth()->guard()->user()!=null ? auth()->guard()->user()->id : null)->orderBy('created_at', 'desc')->paginate(10);
        }   

        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {   
        $category = Category::all();

        $status = Post::statuses();
       
        return view('admin.post.create', compact('category','status'));

    
    }   

    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'price'   => 'required',
            'category_id' => 'required',
            'description' => 'nullable'
        ]);

        //upload image
        $image = $request->file('image');   
        $image->storeAs('public/posts', $image->hashName());    

        $post = Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'price'   => $request->price,
            'category_id' => $request->category_id,
            'status'   => "0",
            'user_id' => Auth::user()->id,
            'description' => $request->description
        ]);

        if($post){
            //redirect dengan pesan sukses
            Session::flash('success', 'Please wait from admin to approve your NFT.');
            return redirect()->route('post.index');
        }else{
            //redirect dengan pesan error
            Session::flash('error', 'NFT could not be saved.');
            return redirect()->route('post.index');
        }
    }   




    public function show($id) 
    {
        // return view('coolnft.nft.show');
    }

    public function edit(Post $post)
    {

        $category = Category::all();    
        $status = Post::statuses();

        $selected = explode(",", $post->category_id);
    
        return view('admin.post.edit', compact('post','category','selected','status'));
    }


    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title'     => 'required',
            'price'   => 'required',
            'status'   => 'required',   
            'category_id' => 'required',
            'description' => 'nullable'
        ]);

        //get data Blog by ID
        $post = Post::findOrFail($post->id);

        if($request->file('image') == "") {

            $post->update([
                'title'     => $request->title,
                'price' => $request->price,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'description' => $request->description
            ]);

        } else {

            //hapus old image   
            Storage::disk('local')->delete('public/posts/'.$post->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'price'   => $request->price,
                'category_id' => $request->category_id,
                'status'   => $request->status,
                'description' => $request->description

            ]);

        }

        if($post){
            //redirect dengan pesan sukses
            Session::flash('success', 'NFT has been update.');
            return redirect()->route('post.index');
        }else{
            //redirect dengan pesan error
            Session::flash('error', 'NFT could not be update.');
            return redirect()->route('post.index');
        }

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        Storage::disk('local')->delete('public/posts/'.$post->image);
        $post->delete();

        if($post){
            //redirect dengan pesan sukses
            Session::flash('success', 'NFT has been delete.');
            return redirect()->route('post.index');
        }else{
            //redirect dengan pesan error
            Session::flash('error', 'NFT could not be delete.');
            return redirect()->route('post.index');
        }
    }
}