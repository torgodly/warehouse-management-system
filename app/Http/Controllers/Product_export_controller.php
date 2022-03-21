<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Product_import;
use App\Models\Product_report;
use App\Models\Type;

class Product_export_controller extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $types = Type::all();
        return view('export', compact('sections', 'types'));
    }

    public function store()
    {
        $data =  request()->validate([
            'product_name' => ['string', 'required', 'max:200'],
            'product_type' => ['string', 'required', 'max:200'],
            'quantity' => ['required', 'integer'],
            'section' => ['required']
        ]);



        $if_exist = Product_import::where('product_name', $data['product_name'])->where('product_type', $data['product_type'])->first();


        if (!$if_exist == null and $if_exist['quantity'] <= 0) {
            return back()->withErrors(['product_name' => "كمية هذا المنتج هي 0"]);
        } elseif (!$if_exist == null and $if_exist['quantity'] - $data['quantity'] < 0) {
            return back()->withErrors(['product_name' => "الكميه غير كافيه"]);
        } elseif (!$if_exist == null) {
            $report_data = Arr::add($data, 'in_out', 'out');
            $report_data = Arr::add($report_data, 'price', $if_exist['price']);
            $if_exist->decrement('quantity', request('quantity'));
            Product_report::create($report_data);
            return redirect('/export');
        }

        return back()->withErrors(['product_name' => "هذا المنتج غير موجود"]);
    }
}
