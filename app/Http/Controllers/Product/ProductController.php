<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    
    public function index()
    {

        $products = Product::orderby('id', 'desc')->get();

        // $product = Product::where('name', 'iPhone 13')->first();
        // $product = Product::find(1);



        return view('product', compact('products'));
        
    }

    
    public function create()
    {
        return view('addProduct');
        
    }

  
    public function store(Request $request)
    {
       

        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
            'description' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ];

        Product::create($data);

        $notify = ['message' => 'Category created successfully', 'alert-type' => 'success'];
        return redirect()->route('product');

    }

    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('addProduct', compact('product'));

        
    }

    
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
            'description' => 'required',
            'price' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ];

        $product->update($data);
        // $product->save();
        // Product::where('price', '<', 1000)->update(['price' => 1099]);
        


        $notify = ['message' => 'Category created successfully', 'alert-type' => 'success'];
        return redirect()->route('product');

    }

    
    public function destroy(string $id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back();
    }
}
