<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements ProductInterface
{
    public function all()
    {
        return Product::all();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = Product::find($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function search($name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }
}
