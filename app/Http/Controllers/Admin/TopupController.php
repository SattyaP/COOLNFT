<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Topup;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Session;

class TopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->roles->implode('name', ', ') == "Admin") 
        {
            $topup = Topup::latest('id')->paginate(10);

        } else {
            $topup = Topup::where('user_id', auth()->guard()->user()!=null ? auth()->guard()->user()->id : null)->orderBy('created_at', 'desc')->paginate(10);
        }

        $status = Topup::statuses();
        $user =  \Auth::user();
        
        return view('admin.topup.index', compact('topup','status','user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Topup::statuses();

        return view('admin.topup.create', compact('status'));
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
            'amount' => 'required',
        ]);

        $topup = Topup::create([
            'amount' => $request->amount,
            'user_id' => Auth::user()->id,
            'status' => "0"
        ]);

        if($topup){
            Session::flash('success', 'Please wait from admin to approve your topup.');
            return redirect()->route('topup.index');
        } else {
            Session::flash('error', 'Failed to topup.');
            return redirect()->route('topup.index');
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
    public function edit(Topup $topup)
    {
        $status = Topup::statuses();

        return view('admin.topup.edit', compact('topup','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topup $topup)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $topup = Topup::findOrFail($topup->id);

        $user = User::findOrFail($topup->user_id);

        if( $request->status == '1')
        {
            $topup->update([
                'status' => $request->status,
            ]);

            $balance = $user->balance;
            $total = $balance + $topup->amount;

            $user->update([
                'balance' => $total
            ]);

        } else {
            $topup->update([
                'status' => $request->status,
            ]);
        }

        if($topup){
            //redirect dengan pesan sukses
            Session::flash('success', 'Topup has been Approve.');
            return redirect()->route('topup.index');
        }else{
            //redirect dengan pesan error
            Session::flash('error', 'Failed to approve .');
            return redirect()->route('topup.index');
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
        //
    }
}
