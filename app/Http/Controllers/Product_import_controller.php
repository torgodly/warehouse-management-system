<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Product_import;
use App\Models\Product_report;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class Product_import_controller extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $types = Type::all();
        return view('import', compact('sections', 'types'));
    }


    public function store()
    {

        $data =  request()->validate([
            'product_name' => ['string', 'required', 'max:200'],
            'product_type' => ['string', 'required', 'max:200'],
            'quantity' => ['integer', 'required'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'section' => ['required'],
        ]);



        $report_data = Arr::add($data, 'in_out', 'in');


        $if_exist = Product_import::where('product_name', $data['product_name'])->where('product_type', $data['product_type'])->first();
        if (!$if_exist == null) {
            $if_exist->update(['price' => $data['price']]);
            $if_exist->increment('quantity', $data['quantity']);

            Product_report::create($report_data);
            return redirect('/import');
        } else {

            Product_import::create($data);
            Product_report::create($report_data);

            return redirect('/import');
        }





    }

}
