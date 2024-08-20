<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;

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

    public function savePedido(Request $request) {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'No tienes productos en tu carrito.');
        }
    
        $total = $cartItems->sum(function($cartItem) {
            // aseguramos que el precio unitario y la cantidad sean numéricos
            $precioUnitario = floatval($cartItem->product->precio_unitario);
            $cantidad = intval($cartItem->quantity);
    
            return $precioUnitario * $cantidad;
        });
    
        // crear el pedido
        $pedido = Pedido::create([
            'user_id' => $user->id,
            'total' => $total,
            'estado' => 'pendiente',
        ]);
    
        // asignar los productos al pedido
        foreach ($cartItems as $cartItem) {
            $pedido->products()->attach($cartItem->product_id, ['quantity' => $cartItem->quantity]);
        }
    
        // vaciar el carrito después de guardar el pedido
        Cart::where('user_id', $user->id)->delete();
    
        return redirect()->route('cart-index')->with('success', 'Pedido guardado exitosamente.');
    }
    

}
