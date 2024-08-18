<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidosController extends Controller
{
    public function showPedidos() {
        $pedidos = Pedido::all();

        return view('pedidos', compact('pedidos'));
    }

    public function cambiarEstadoPedido(Request $request, $id) {
        
        $pedidoAEditar = Pedido::findOrFail($id);
        $pedidoAEditar->update(request()->all());
    }
}
