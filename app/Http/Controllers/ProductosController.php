<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProductosController extends Controller
{
    public function index(Request $request){
        if(!empty($request ->records_per_page)){
            $request -> records_per_page = $request ->records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page
                                                                                                       :env('PAGINATION_MAX_SIZE');

        } else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $productos=Producto::where('NOMBRE', 'LIKE', '%' . $request->filter . '%')
                        ->paginate($request -> records_per_page);

        return view('productos/index', ['productos' => $productos,
                                        'data'=> $request]);

    }

    public function create(){

        return view('productos/create');
    }

    public function store(Request $request){

        try {

            $producto = new Producto();
            $producto->NOMBRE = $request->NOMBRE;
            $producto->TIPO = $request->TIPO;
            $producto->DESCRIPCION = $request->DESCRIPCION;
            $producto->save();

            Session::flash('message', ['content' => 'Sección agregada con éxito', 'type' => 'success']);
            return redirect()->action([ProductosController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
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
