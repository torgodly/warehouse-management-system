<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class Section_controller extends Controller
{
    public function index()
    {
        return view('addsection');
    }

    public function store()
    {
        $atr = request()->validate([

            'name' => ['required', 'max:30', 'min:3', 'unique:sections,name'],

        ]);



        Section::create($atr);



        return redirect('/')->with('success', 'تم إنشاء الجهة');
    }
}
