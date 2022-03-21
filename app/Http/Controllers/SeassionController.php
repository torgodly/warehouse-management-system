<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session_report;
use Illuminate\Support\Facades\Auth;

class SeassionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store()
    {

        $credentials =  request()->validate([

            'email' => ['exists:users,email', 'required'],
            'password' => ['required']

        ]);

        if (auth()->attempt($credentials)) {

            Session_report::create(['name'=>Auth::user()->name, 'postion'=>Auth::user()->position, 'login_logout'=>'login']);
            return redirect('/')->with('success', 'أهلا وسهلا');

        }

        return back()->withErrors(['email' => "بريد أو كلمة مرور غير صحيحة"]);
    }

    public function logout()
    {
        Session_report::create(['name'=>Auth::user()->name, 'postion'=>Auth::user()->position, 'login_logout'=>'logout']);
        auth()->logout();
        return redirect('/');
    }
}
