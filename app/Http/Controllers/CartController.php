<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;

class CartController extends Controller
{
    public function list() {
        $cart = session('cart');

        $totalAmount = 0;
        if(session('cart')){
            foreach ($cart as $item) {
                $totalAmount += $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']);
            }
        }
        
        return view('cart-list', compact('totalAmount'));
    }

    public function add()
    {
        $product = Product::query()->findOrFail(\request('product_id'));
        $productVariant = ProductVariant::query()
            ->with(['color', 'size'])
            ->where([
                'product_id' => \request('product_id'),
                'product_size_id' => \request('product_size_id'),
                'product_color_id' => \request('product_color_id'),
            ])
            ->firstOrFail();

        if (!isset( session('cart')[$productVariant->id] ) ) {
            $data = $product->toArray() + $productVariant->toArray();
            $data['quantity'] = \request('quantity');
            session()->put('cart.' . $productVariant->id,  $data);
        } else {
            $data = session('cart')[$productVariant->id];
            $data['quantity'] = \request('quantity');

            session()->put('cart.' . $productVariant->id,  $data);
        }

        return redirect()->route('cart.list');
    }
}
