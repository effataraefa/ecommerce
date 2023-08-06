<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::paginate(10);
        $products= Product::with('brand')->paginate(5);
        return view('backend.pages.product.list', compact('products'));
    }
    public function form()
    {

        return view('backend.pages.product.form');
    }
    public function store(Request $request)
    {


        //dd($request->all());//check data are coming or not

        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|gt:100',
            'product_stock' => 'required|gt:10',
            'product_quantity' => 'required|gt:10'
        ]);

      $fileName=null;

        if ($request->hasFile('image')) {
            $file= $request->file('image');
            $fileName = date('Ymdhsi') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/product', $fileName);
        }

        Product::create([
            'name' => $request->product_name,
            'price' => $request->product_price,
            'quantity' => $request->product_quantity,
            'stock' => $request->product_stock,
            'brand_id'=>$request->brand,
            'description' => $request->description,
            'image' => $fileName
        ]);

        return redirect()->back()->with('msg', 'Product Created successfully.');
    }
}
