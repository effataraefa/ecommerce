<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::paginate(5);
        // dd($categories);
        return view('backend.pages.category.list', compact('categories'));
    }
    public function categoryForm()
    {
        return view('backend.pages.category.form');
    }

    public function categoryStore(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => 'required'
        ]);


        Category::create([
            //bam pase table er column name => dan pase input field er nam
            'name' => $request->name,
            'description' => $request->description // nullable
        ]);

        return redirect()->route('category.list');
    }
}
