<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = $this->productRepository->create($request->all());
        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product, 200);
    }

    public function update(Request $request, $id)
    {
        $product = $this->productRepository->update($id, $request->all());

        return response()->json(['message' => 'Product updated successfully', 'data' => $product], 200);
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return response()->json(['message' => 'Product deleted successfully'], 204);
    }

    public function search($name)
    {
        $products = $this->productRepository->search($name);

        if ($products->isEmpty()) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($products, 200);
    }
}
