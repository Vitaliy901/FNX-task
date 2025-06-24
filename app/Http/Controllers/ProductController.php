<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        $products = Product::orderBy('in_stock', 'desc')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Products', [
            'products' => $products
        ]);
    }

/*    public function addProducts(Request $request, Product $product)
    {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|integer|min:0',
        ]);

        $user = $request->auth();
        dump($user);
        $cart = Cart::findOrFail($user->cart->id);

        $productData = [];
        foreach ($validated['products'] as $product) {
            $productData[$product['product_id']] = [
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ];
        }

        $cart->products()->attach($productData);

        return response()->json(['message' => 'Products added to cart']);
    }*/


    public function updateStock(Request $request, Product $product)
    {
        $validated = $request->validate([
            'in_stock' => 'required|integer|min:0'
        ]);

        $product->in_stock = $validated['in_stock'];
        $product->save();

        return redirect()->back();
    }


}
