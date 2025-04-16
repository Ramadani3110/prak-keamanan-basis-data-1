<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $product = Product::select("id","name","foto","stock","category_id")->get();
        return view("product.index",[
            'product' => $product
        ]);
    }

    public function create(){
        $category = Category::select("id","name")->get();
        return view('product.create', [
            "category" => $category
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'stock' => 'required|integer',
            'category' => 'required|exists:categories,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension(); 
            $fileName = Str::random(40) . '.' . $extension; 
            $photoPath = $request->file('foto')->storeAs('product_photos', $fileName, 'public');
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->foto = $photoPath; 
        $product->save();

        return redirect('/product')->with('success', 'Product created successfully!');
    }

    public function edit($id){
        $category = Category::select("id","name")->get();
        $product = Product::find($id);
        return view('product.update',[
            'product' => $product,
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'stock' => 'required|integer|min:1',
            'category' => 'required|exists:categories,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($product->foto && Storage::disk('public')->exists($product->foto)) {
                Storage::disk('public')->delete($product->foto);
            }

            $extension = $request->file('foto')->getClientOriginalExtension();
            $fileName = Str::random(40) . '.' . $extension;
            $photoPath = $request->file('foto')->storeAs('product_photos', $fileName, 'public');
        } else {
            $photoPath = $product->foto;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->foto = $photoPath; 
        $product->save();

        return redirect('/product')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->photo && Storage::disk('public')->exists($product->photo)) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return redirect('/product')->with('success', 'Product deleted successfully!');
    }
}
