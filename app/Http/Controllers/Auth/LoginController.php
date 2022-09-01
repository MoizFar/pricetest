<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login()
    {
        return view('auth.login');
    }
    
    public function userlogin(Request $request)
    {

        $email = $request->get('email');
        $password = $request->get('password');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            if ($user->status == "Inactive") {
                Auth::logout();
                Session::put("login_error", 'Sorry');
                return redirect('admin/login');
            }
            return redirect('/admin/home');
        } else {
            Session::put("login_error", 'We cannot find you in our database');
            return redirect('/admin/login');
        }

       
    }

   
    
}
