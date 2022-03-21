<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_report;

class Product_report_controller extends Controller
{
    public function index(){
        $reports = Product_report::latest()->paginate(10);
        return view('reports', compact('reports'));
    }

    public function show($in_out){

        $reports = Product_report::latest()->where('in_out', $in_out)->paginate(10);
        return view('reports', compact('reports'));
    }

    public function showname($name){

        $reports = Product_report::latest()->where('product_name', $name)->paginate(10);
        return view('reports', compact('reports'));
    }

    public function shownametype($name, $type){

        $reports = Product_report::latest()->where('product_name', $name)->where('product_type', $type)->paginate(10);
        return view('reports', compact('reports'));
    }
}
