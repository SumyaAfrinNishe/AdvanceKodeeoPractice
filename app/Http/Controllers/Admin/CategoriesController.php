<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function list(){
        $categories = Category::paginate(5);
        return view('admin.pages.categories.list', compact('categories'));
    }
    public function create(){
        $categories=category::select('id','name')->orderBy('id','desc')->get();
        return view('admin.pages.categories.create', compact('categories'));

    }
    public function store(Request $request){
        Category::create([
            'name'=>$request->name,
            'details'=>$request->details,
            'parent_id'=>$request->parent_id,
            'image'=>$request->image
          
           ]);
        return redirect()->back()->with('success','Add Category Successfully');
    }

    public function edit($category_id){


        $category=Category::find($category_id);
        $categories=category::select('id','name', 'details')->orderBy('id','desc')->get();
       return view('admin.pages.categories.edit', compact('category', 'categories'));
    }
    public function update(Request $request, $category_id){
        $categories=category::all();
        Category::where('id', $category_id)->update([
 
            'name'=>$request->name,
            'details'=>$request->details,
            'parent_id'=>$request->category,
            'image'=>$request->image
 
        ]);
        return redirect()->back()->with('success','Updated Category Successfully');



    }

    public function delete ($category_id){

        category::find($category_id)->delete();
        return redirect()->back()->with('success','Category Deleted.');



    }
   
}
