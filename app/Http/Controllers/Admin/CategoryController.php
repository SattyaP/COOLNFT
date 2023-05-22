<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $category = Category::orderBy('id')->paginate(10);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' =>'required',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('category.index')->with(['success' => 'Category has been added successfully']);
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,Category $category)
    {
        $this->validate($request, [
            'name' =>'required',
            'slug' => 'required'
        ]);

        $category = Category::findOrFail($category->id);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        if($category){
            //redirect dengan pesan sukses
            return redirect()->route('category.index')->with(['success' => 'Category has been Update!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('category.index')->with(['error' => 'Category failed to Update!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if($category){
            //redirect dengan pesan sukses
            return redirect()->route('category.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('category.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
