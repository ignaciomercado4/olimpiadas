<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(Request $request) {
        $productData = request()->all();

        Product::create($productData);
    
        return redirect(route('productoCreadoExitosamente'));
    }

    public function modify($id) {
        $productoAEditar = Product::findOrFail($id);
        $productoAEditar->update(request()->all());

        return redirect(route('productosExistentes'));
    }

    public function delete($id) {
        $productoAEliminar = Product::findOrFail($id);
        $productoAEliminar->delete();

        return redirect(route('productosExistentes'));
    }

    public function showProductosExistentes() {
        $productosExistentes = Product::all();

        return view('productosExistentes', compact('productosExistentes'));
    }
}
