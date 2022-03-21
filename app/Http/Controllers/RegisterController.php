<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(){

        $atr = request()->validate([

            'name' => ['required', 'max:30', 'min:3'],
            'position' => ['required' , 'max:30'],
            'level' => ['required' , 'in:0,1', 'max:1'],
            'email' => ['email','required','max:255','unique:users,email'],
            'password' => ['max:32', 'min:6', 'required'],

        ]);



        $atr['password'] = bcrypt($atr['password']);

        User::create($atr);


        return redirect('/')->with('success', 'تم إنشاء الحساب');


    }
}
