<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list(){

        $dress=Brand::all();
        return view('backend.pages.brand.list',compact('dress'));
    }
    public function brandForm(){
        return view('backend.pages.brand.form');
    }
    public function brandStore(Request $request)
    {

        $request->validate([
           'name'=>'required'
        ]);

       Brand::create([
          'name'=>$request->name,
          'description'=>$request->description
       ]);


       return redirect()->back();

    }

}
