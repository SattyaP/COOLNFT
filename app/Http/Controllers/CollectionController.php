<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class CollectionController extends Controller
{   

    public function __construct()
	{
		// parent::__construct();

		$this->data['search'] = null;

		// $this->data['categories'] = Category::parentCategories()
		// 	->orderBy('name', 'asc')
		// 	->get();
    }


    public function __invoke(Request $request)
    {

        $posts = Post::latest('id')->paginate(10);
        // $posts = $this->search($posts, $request);
        $category = Category::all();
        return view('coolnft.collection.layout',compact('posts','category'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $posts = Post::latest('id')->paginate(10);
        // $posts = $this->search($posts, $request);
        $category = Category::all();
        return view('coolnft.collection.layout',compact('posts','category'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $category = Category::all();
        $posts = Post::where('title','LIKE','%'.$search.'%')->paginate(20);
        return view('coolnft.collection.layout',compact('posts','category'));
    }

    public function filter(Request $request)
    {
        $search = $request->get('filter');
        $category = Category::all();
        
        $posts = Post::where('category_id','LIKE','%'.$search.'%')->paginate(20);
        return view('coolnft.collection.layout',compact('posts','category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
