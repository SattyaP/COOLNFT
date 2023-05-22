<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Post;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller

{
    public function index()
    {
        return view('coolnft.auth.login');
    }  
      
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }
  
        return redirect()->route('login')->with(['error' => 'Login details are not valid!']);
    }

    public function register()
    {
        return view('coolnft.auth.register');
    }
      
    public function userRegister (Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("/login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('coolnft.admin.dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function logOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}