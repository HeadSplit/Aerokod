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
        return response()->json($products, 200);
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return response()->json($product, 200);
    }

    public function showCategory()
    {
        $categories = ProductCategory::with('childrenRecursiveForCategory')
            ->whereNull('parent_id')
            ->paginate(6);

        return response()->json(['data' => CategoryResource::collection($categories)], 200);
    }


    public function showCategoryWithProducts()
    {
        $categories = ProductCategory::with('childrenRecursiveForCategoryWithProduct.products')->whereNull('parent_id')->paginate(6);

        return response()->json([
            'data' => CategoryWithProductResource::collection($categories),
            'message' => 'Возьмите на работу)',
            'meta' => [
                'current_page' => $categories->currentPage(),
                'per_page' => $categories->perPage(),
                'total' => $categories->total(),
                'last_page' => $categories->lastPage(),
            ],
        ], 200);
    }
}
