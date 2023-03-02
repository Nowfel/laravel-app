<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::all();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = Product::create($request->all());
        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
    }

    
    public function show($id)
    {
        // return Product::find($id);
        $product = Product::withTrashed()->findOrFail($id);
        // $records = Product::onlyTrashed()->get();


        // To restore a soft-deleted record
        // This will restore the product to the database and remove the deleted_at timestamp.
        $product->restore();

        // $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

   
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->update($request->all());
        return response()->json(['message' => 'Product updated successfully', 'data' => $product], 200);

        
    }

   
    public function destroy($id)
    {
        // return Product::destroy($id);
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 204);
    }

    public function search($name)
    {
        $product = Product::where('name', 'like', '%'.$name.'%')->get();
        if ($product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }
   
}
