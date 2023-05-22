<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Post;
use App\Models\User;

use Auth;
use Session;
use Redirect;
use App\Authorizable;

class OrderController extends Controller
{

    // use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->roles->implode('name', ', ') == "Admin") 
        {
            $posts = Post::orderBy('id')->paginate(10);

        } else {
            $posts = Post::where('user_id', auth()->guard()->user()!=null ? auth()->guard()->user()->id : null)->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.order.index', compact('posts'));
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
    public function store($id)
    {

        $post = Post::findOrFail($id);

        $ownedUser = User::findOrFail($post->user_id);

        $total = $post->price + $ownedUser->balance;

        $userOrder = Auth::user();

        if ($userOrder->balance < $post->price) {
           Session::flash('error','Saldo Kurang');  
           return redirect('post/' . $post->title);
        } else {
            $userOrder->update([
            'balance' => $userOrder->balance - $post->price 
            ]);

            $ownedUser->update([
                'balance' => $total 
            ]);

            $order = Order::create([
                'post_id' => $id,
                'user_id' => Auth::user()->id,
                'price' => $post->price
            ]);

            $post->update([
                'user_id' => Auth::user()->id,
                'price' => $post->price + 1
            ]);

            if($order){
                //redirect dengan pesan sukses
                Session::flash('success', 'Success Order');
                return redirect('post/' . $post->title);
            }else{
                //redirect dengan pesan error
                Session::flash('error', 'Failed to Order');
                return redirect('post/' . $post->title);
            }

        }

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
