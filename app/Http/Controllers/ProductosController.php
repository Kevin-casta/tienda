<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductosController extends Controller
{
    public function index(){
        $producto = Producto::all();
        return view('productos/index', ['producto' => $producto ]);

    }

    public function create(){

        return view('productos/create');
    }

    public function store(Request $request){

        try{
         $producto= new Producto();
         $producto->NOMBRE=$request -> NOMBRE;
         $producto -> DESCRIPCION= $request -> DESCRIPCION;
         $producto -> save();

         return redirect()->action([ProductosController::class, 'index'])
                                    ->with('success', 'Producto creado exitosamente.');


        } catch(Exception $ex){
            Log::error('Error al crear producto: ' . $ex->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al crear el producto.');

        }

    }

    public function edit($id){

        $producto=Producto::find($id);

        return view('productos/edit', ['producto' => $producto]);
    }

    public function update(Request $request){

        try{

         $producto=  Producto::find($request->id);

         if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }
         $producto->NOMBRE=$request -> NOMBRE;
         $producto -> DESCRIPCION= $request -> DESCRIPCION;
         $producto -> save();

         return redirect()->action([ProductosController::class, 'index'])
                                    ->with('success', 'Producto creado exitosamente.');


        } catch(Exception $ex){
            Log::error('Error al editar producto: ' . $ex->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al editar el producto.');

        }

    }

    public function delete($id){

        $producto=Producto::find($id);

        $producto->delete();

        return redirect()->action([ProductosController::class, 'index'])
        ->with('success', 'Producto eliminado exitosamente.');
    }


}
