<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Venta;

class PedidosController extends Controller
{
    public function showPedidos() {
        $pedidos = Pedido::all();
        return view('pedidos', compact('pedidos'));
    }

    public function cambiarEstadoPedido(Request $request, $id) {
        $pedidoAEditar = Pedido::findOrFail($id);
        $nuevoEstado = $request->input('estado');
        $pedidoAEditar->update(['estado' => $nuevoEstado]);

        // solo guardar en ventas si el nuevo estado es 'entregado'
        if ($nuevoEstado === 'entregado') {
            Venta::create([
                'total' => $pedidoAEditar->total,
                'comprador' => $pedidoAEditar->comprador,
                'numero_pedido' => $pedidoAEditar->id,
                'direccion' => $pedidoAEditar->direccion,
            ]);
        }

        return redirect()->back()->with('success', 'El estado del pedido se ha actualizado correctamente.');
    }

    public function delete($id) {
        $pedido = Pedido::findOrFail($id);

        // eevolver el stock de los productos asociados al pedido
        foreach ($pedido->products as $product) {
            $cantidad = $product->pivot->quantity;
            $product->stock += $cantidad;
            $product->save();
        }

        // eliminar la relación entre el pedido y los productos
        $pedido->products()->detach();

        // eliminar el pedido
        $pedido->delete();

        return redirect()->route('cart-index')->with('success', 'Pedido eliminado y stock restaurado exitosamente.');
    }
}
