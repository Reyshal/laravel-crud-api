<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddRequest;
use App\Models\Product;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Retrieves all products from the database and returns them.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Product[]
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Retrieves a product from the database based on its slug.
     *
     * @param string $slug The slug of the product to retrieve.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the product with the given slug is not found.
     * @return \App\Models\Product The retrieved product.
     */
    public function show($slug)
    {
        $product = Product::where('slug', strtolower($slug))->first();

        return $product ?? response()->json([
            'code' => 404,
            'message' => 'Product not found'
        ], 404);
    }

    /**
     * Store a new product in the database.
     *
     * @param ProductAddRequest $request The request containing the validated data for the new product.
     * @throws ValidationException Returns the newly created product as a JSON response.
     * @return \App\Models\Product The newly created product.
     */
    public function store(ProductAddRequest $request)
    {
        $validated = $request->validated();

        // Validate the base price and price
        if ($validated->base_price > $validated->price) {
            return response()->json([
                'message' => 'Base price cannot be greater than price'
            ]);
        }

        return Product::create([
            'title' => $validated->title,
            'slug' => strtolower(str_replace(' ', '-', $validated->title)),
            'base_price' => $validated->base_price,
            'price' => $validated->price,
            'description' => $validated->description
        ]);
    }

    /**
     * Delete a product from the database.
     *
     * @param int $id The ID of the product to delete.
     * @return \Illuminate\Http\Response Returns a JSON response indicating success.
     */
    public function destroy($slug)
    {
        Product::where('slug', $slug)->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Product deleted successfully'
        ]);
    }
}
