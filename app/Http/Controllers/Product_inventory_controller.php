<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_import;

use function PHPSTORM_META\type;

class Product_inventory_controller extends Controller
{
    public function index(){
        $items = Product_import::latest()->paginate(10);
        return view('inventory', compact('items'));
    }


    public function destory($name, $type){

        // dd($name, $type);

        Product_import::where('product_name', $name)->where('product_type', $type)->delete();
        return redirect('/inventory');

    }
}
