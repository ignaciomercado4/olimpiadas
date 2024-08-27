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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // validación de imagen
        ]);

        $productData = $request->all();

        // manejo de la imagen
        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();  
            $request->imagen->move(public_path('images'), $imageName);
            $productData['imagen'] = 'images/' . $imageName;
        }

        Product::create($productData);
    
        return redirect()->back()->with('success', 'Producto creado exitosamente.');
    }

    public function modify(Request $request, $id) {
        
        $request->validate([
            'codigo_producto' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'precio_unitario' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // validación de imagen
        ]);

        $productoAEditar = Product::findOrFail($id);
        
        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();  
            $request->imagen->move(public_path('images'), $imageName);
            $productoAEditar->imagen = 'images/' . $imageName;
        }        

        $productoAEditar->fill($request->except('imagen'));
        
        $productoAEditar->save();
    
        return redirect()->route('productosExistentes')->with('success', 'Producto modificado exitosamente.');
    }
    
    public function delete($id) {
        $productoAEliminar = Product::findOrFail($id);
        $productoAEliminar->delete();
    
        return redirect()->route('productosExistentes')->with('success', 'Producto eliminado exitosamente.');
    }    

    public function showProductosExistentes(Request $request) {
        $query = $request->input('search');
        $categorias = $request->input('categoria', []);
    
        $productosExistentes = Product::query();
    
        if ($query) {
            $productosExistentes->where('titulo', 'LIKE', "%$query%");
        }
    
        if (!empty($categorias)) {
            $productosExistentes->whereIn('categoria', $categorias);
        }
    
        $productosExistentes = $productosExistentes->get();
    
        $categoriasDisponibles = ['Calzado', 'Remera', 'Pantalón', 'Short', 'Pelota', 'Accesorios', 'Utilidades', 'Otros'];
        $categoriasFiltradas = $categorias;
    
        return view('productosExistentes', compact('productosExistentes', 'categoriasDisponibles', 'categoriasFiltradas'));
    }    
}
