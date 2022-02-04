<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Symfony\Component\HttpFoundation\Response;

class ShowCategoryController extends Controller
{
    public function show(Request $request, $id)
    {
        $category = Category::find($id);
        if (empty($category)) {
            return response()->json(['error' => 'Category not found'], Response::HTTP_NOT_FOUND);
        }

        return new CategoryResource($category);
    }
}
