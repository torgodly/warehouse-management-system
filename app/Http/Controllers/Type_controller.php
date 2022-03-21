<?php

namespace App\Http\Controllers;

use App\Models\type;
use Illuminate\Http\Request;

class Type_controller extends Controller
{
    public function index()
    {
        return view('addtype');
    }

    public function store()
    {
        $atr = request()->validate([

            'name' => ['required', 'max:30', 'min:3', 'unique:sections,name'],

        ]);



        type::create($atr);



        return redirect('/')->with('success', 'تم إنشاء النوع');
    }
}
