<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products with filters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category/categories
        if ($request->has('category')) {
            $categories = explode(',', $request->input('category'));
            $query->whereHas('category', function ($query) use ($categories) {
                $query->whereIn('id', $categories);
            });
        }

        // Filter by price
        if ($request->has('price_min')) {
            $query->where('price', '>=', $request->input('price_min'));
        }

        if ($request->has('price_max')) {
            $query->where('price', '<=', $request->input('price_max'));
        }

        // Filter by weight
        if ($request->has('weight_min')) {
            $query->where('weight', '>=', $request->input('weight_min'));
        }

        if ($request->has('weight_max')) {
            $query->where('weight', '<=', $request->input('weight_max'));
        }

        // Filter by width
        if ($request->has('width_min')) {
            $query->where('width', '>=', $request->input('width_min'));
        }

        if ($request->has('width_max')) {
            $query->where('width', '<=', $request->input('width_max'));
        }

        // Filter by height
        if ($request->has('height_min')) {
            $query->where('height', '>=', $request->input('height_min'));
        }

        if ($request->has('height_max')) {
            $query->where('height', '<=', $request->input('height_max'));
        }
        $products = $query->get();

        return response()->json([
            'status' => true,
            'message' => 'Returned Successfully',
            'data' => $products,
        ]);
    }
    public function showBySlug($slug): \Illuminate\Http\JsonResponse
    {
        try {
            $product = Product::where('slug', $slug)->firstOrFail();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Returned Successfully',
            'data' => $product,
        ]);
    }
}
