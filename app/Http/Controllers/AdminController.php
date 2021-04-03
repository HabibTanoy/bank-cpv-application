<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
            return redirect()->intended(route('admin-dashboard'));
        }
        return redirect()->intended(route('admin-login'));
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin-login');
    }
    public function userIndex() {
        $authenticated_user = Auth::user();
        return view('admin.index', compact('authenticated_user'));
    }
    public function registerNewUser() {
        // dd(1);
        return view('admin.register');
    }
}
