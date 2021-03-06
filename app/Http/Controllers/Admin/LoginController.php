<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
//        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Display login view.
     *
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->to('admin/dashboard');
        }
        return view('admin/login');
    }

    /**
     * Handle a admin login request to cms
     *
     */
    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->to('admin/dashboard');
        } else {
            return redirect()->back()->with(['error' => 'Login error, check your username anda password again']);
        }
    }

    /**
     * Handle logout admin
     *
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->to('admin');
    }
}
