<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentasController extends Controller
{
    public function showVentas() {
        $ventas = Venta::all();

        return view('ventas', compact('ventas'));
    }
    public function delete($id){
        $venta = Venta::find($id);
        if ($venta) {
            $venta->delete();
            return redirect()->route('viewVentas')->with('success', 'Venta eliminada con éxito.');
        } else {
            return redirect()->route('viewVentas')->with('error', 'Venta no encontrada.');
        }
    }


}
