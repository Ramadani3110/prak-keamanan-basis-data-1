<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::select("id","name")->get();
        return view("category.index",[
            "category"=> $category
        ]);
    }

    public function create(){
        return view("category.create");
    }

    public function store(Request $request){
        $request->validate([
            "name"=> "required|min:3",
        ]);

        $category = Category::create([
            "name"=> $request->name
        ]);

        return redirect("/category")->with("success","Successfully add category");
    }

    public function edit($id){
        $category = Category::find($id);
        return view("category.update",[
            "category" => $category
        ]);
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $request->validate([
            "name"=> "required|min:3|unique:categories,name,".$id,
        ]);
        $category->name = $request->name;
        $category->save();
        return redirect("/category")->with("success","Successfully update category");
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect("/category")->with("success","Successfully delete category");
    }
}
