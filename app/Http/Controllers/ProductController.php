<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'codigo_producto' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'precio_unitario' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validación de imagen
        ]);

        $productData = $request->all();

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();  
            $request->imagen->move(public_path('images'), $imageName);
            $productData['imagen'] = 'images/' . $imageName;
        }

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
