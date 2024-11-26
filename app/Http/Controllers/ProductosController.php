<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\categoria_prod;

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
        $categorias=categoria_prod::all();
        return view('productos/create',  compact('categorias'));
    }

    public function store(Request $request){

        try {

            $producto = new Producto();
            $producto->NOMBRE = $request->NOMBRE;
            $producto->TIPO = $request->TIPO;
            $producto->DESCRIPCION = $request->DESCRIPCION;
            $producto->save();

            Session::flash('message', ['content' => 'Producto agregada con éxito', 'type' => 'success']);
            return redirect()->action([ProductosController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }

    }

    public function edit($id){

        $producto=Producto::find($id);

        if (empty($producto)) {

            Session::flash('message', ['content' => "El producto con id '$id' no existe.", 'type' => 'error']);
            return redirect()->back();
        }

        return view('productos/edit', ['producto' => $producto]);
    }


    public function update(Request $request){

        try{

         $producto=  Producto::find($request->id);

         if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }
        $producto->NOMBRE = $request->NOMBRE;
        $producto->TIPO = $request->TIPO;
        $producto->DESCRIPCION = $request->DESCRIPCION;
         $producto -> save();

         Session::flash('message', ['content' => 'Producto actualizado con éxito', 'type' => 'success']);
            return redirect()->action([ProductosController::class, 'index']);


        } catch(Exception $ex){
            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();

        }

    }

    public function delete($id){

        $producto=Producto::find($id);

        $producto->delete();

        return redirect()->action([ProductosController::class, 'index'])
        ->with('success', 'Producto eliminado exitosamente.');
    }


}
