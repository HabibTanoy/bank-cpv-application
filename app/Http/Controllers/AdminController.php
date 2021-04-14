<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function loginPage() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        
        if(Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->intended(route('welcome-page'));
        }
        return redirect()->intended(route('admin-login'));
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin-login');
    }

    public function registerPage() {
        return view('admin.signup');
    }
    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        $signup = Admin::create([
            'name' => $request-> name,
            'email' => $request-> email,
            'password' => bcrypt($request-> password)
        ]);
        Auth::guard('admin')->login($signup);
        return redirect()->route('welcome-page');
    }
}
