<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::all();
    }

    public function create($data)
    {
        return Product::create($data);
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }

    public function update($id, $data)
    {
        $product = $this->find($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->find($id);
        $product->delete();
    }

    public function search($name)
    {
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
