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
            $precioUnitario = floatval($cartItem->product->precio_unitario);
            $cantidad = intval($cartItem->quantity);
            return $precioUnitario * $cantidad;
        });
    
        // construir la cadena de productos
        $productos = $cartItems->map(function($cartItem) {
            return $cartItem->product->codigo_producto . '(x' . $cartItem->quantity . ')';
        })->implode(', ');
    
        // crear el pedido con el campo productos
        $pedido = Pedido::create([
            'user_id' => $user->id,
            'total' => $total,
            'comprador' => $user->email,
            'direccion' => $user->direccion,
            'estado' => 'pendiente',
            'productos' => $productos, // guardar la cadena en el campo productos
        ]);
    
        // asignar los productos al pedido y reducir el stock
        foreach ($cartItems as $cartItem) {
            
            // reducir el stock del producto
            $product = Product::find($cartItem->product_id);
            $product->stock -= $cartItem->quantity;
            $product->save();
    
            // asociar el producto al pedido con la cantidad correspondiente
            $pedido->products()->attach($cartItem->product_id, ['quantity' => $cartItem->quantity]);
        }
    
        // vaciar el carrito después de guardar el pedido
        Cart::where('user_id', $user->id)->delete();
    
        return redirect()->route('cart-index')->with('success', 'Pedido guardado exitosamente.');
    }
    

    public function deleteFromCart($id){
        $cartItem = Cart::findOrFail($id);
        $user = Auth::user();

        if ($cartItem->user_id == $user->id) {
            if ($cartItem->quantity > 1) {
                // si hay más de una unidad, reducir la cantidad en uno
                $cartItem->quantity -= 1;
                $cartItem->save();
            } else {
                // si solo hay una unidad, eliminar el item del carrito
                $cartItem->delete();
            }

            return redirect()->route('cart-index')->with('success', 'Producto eliminado del carrito.');
        }

        return redirect()->route('cart-index')->with('error', 'No se pudo eliminar el producto del carrito.');
    }

}
