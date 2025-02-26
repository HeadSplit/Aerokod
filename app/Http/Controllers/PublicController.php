<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryWithProductResource;
use App\Models\Product;
use App\Models\ProductCategory;

class PublicController extends Controller
{

    public function index()
    {
        $products = Product::paginate(6);
        return response()->json([$products,'meta' => [
            'current_page' => $products->currentPage(),
            'per_page' => $products->perPage(),
            'total' => $products->total(),
            'last_page' => $products->lastPage(),
            'links' => [
                'first' => $products->url(1),
                'last' => $products->url($products->lastPage()),
                'prev' => $products->previousPageUrl(),
                'next' => $products->nextPageUrl(),
            ], 200]]);
    }

    public function show(Product $product)
    {
        return response()->json(['data' => $product], 200);
    }


    public function showCategory()
    {
        $categories = ProductCategory::with('childrenRecursive')
            ->whereNull('parent_id')
            ->paginate(6);

        return response()->json(['data' => CategoryResource::collection($categories), 'meta' => [
            'current_page' => $categories->currentPage(),
            'per_page' => $categories->perPage(),
            'total' => $categories->total(),
            'last_page' => $categories->lastPage(),
            'links' => [
                'first' => $categories->url(1),
                'last' => $categories->url($categories->lastPage()),
                'prev' => $categories->previousPageUrl(),
                'next' => $categories->nextPageUrl(),
            ],
            ],
        ], 200);
    }




    public function showCategoryWithProducts()
    {
        $categories = ProductCategory::with('products')->paginate(6);


        return response()->json([
            'data' => CategoryWithProductResource::collection($categories),
            'meta' => [
                'current_page' => $categories->currentPage(),
                'per_page' => $categories->perPage(),
                'total' => $categories->total(),
                'last_page' => $categories->lastPage(),
            ],
        ], 200);
    }
}
