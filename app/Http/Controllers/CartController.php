<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();

        // verificar si el usuario no es admin
        if ($user->isAdmin == 0) {
            $product = Product::find($productId);

            if ($product && $product->stock > 0) {
                // verificar si el producto ya está en el carrito
                $cartItem = Cart::where('user_id', $user->id)
                                ->where('product_id', $productId)
                                ->first();

                if ($cartItem) {
                    // incrementar la cantidad si ya existe en el carrito
                    $cartItem->quantity++;
                    $cartItem->save();
                } else {
                    // agregar nuevo producto al carrito
                    Cart::create([
                        'user_id' => $user->id,
                        'product_id' => $productId,
                        'quantity' => 1,
                    ]);
                }

                return redirect()->back()->with('success', 'Producto agregado al carrito.');
            }
        }

        return redirect()->back()->with('error', 'No se pudo agregar el producto al carrito.');
    }

    public function viewCart()
    {
        $user = Auth::user();

        $cartItems = Cart::where('user_id', $user->id)->get();

        return view('indexCarrito', compact('cartItems'));
    }

}
