<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return response()->json([$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        $category = ProductCategory::create($request->validated());

        return response()->json($category, 201);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = ProductCategory::with('childrenRecursive')->findOrFail($id);

        return response()->json($category, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryUpdateRequest $request, string $id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->update($request->validated());

        return response()->json(['message' => 'Категория обновлена', 'data' => $category], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
<<<<<<< HEAD
        $category = ProductCategory::find($id);
        $category->delete();
        
        return response()->json(['message'=>'deleted], 200)
=======
        $category = ProductCategory::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Категория удалена'], 200);
>>>>>>> 2efcbdb (ProductController дописан, ProductCategoryController пофикшен, PublicController теперь соответствует TODO, ProductCategoryUpdateRequest дописан, Все ресурсы были изменены, теперь возвращает все, как нужно, из модели ProductCategory убрал лишний метод, остальные были подвергнуты малозначительным изменениям, модель Product теперь полностью функционирует, у обеих моделей убран timestamps, sead)
    }

}
