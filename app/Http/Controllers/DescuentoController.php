<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use App\Models\categoria_prod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class DescuentoController extends Controller
{
    public function index(Request $request){
        if(!empty($request ->records_per_page)){
            $request -> records_per_page = $request ->records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page
                                                                                                       :env('PAGINATION_MAX_SIZE');

        } else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $descuentos=Descuento::where('descripcion', 'LIKE', '%' . $request->filter . '%')
                        ->paginate($request -> records_per_page);

        return view('descuento/index', ['descuentos' => $descuentos,
                                        'data'=> $request]);

    }

    public function create(){

        $categorias=categoria_prod::all();
        return view('descuento/create',['categorias'=>$categorias]);
    }

    public function store(Request $request){

        Validator::make($request->all(),[
            'descripcion' => 'required',
            'porcentaje' => 'required'
        ],
        [
            'descripcion.required' => 'La descripcion es requerido',
            'porcentaje.required' => 'El porcentaje es requerido',

        ]
        )->validate();

        try {

            $descuento = new Descuento();
            $descuento->categoria_id = $request->categoria_id;
            $descuento->descripcion = $request->descripcion;
            $descuento->porcentaje = $request->porcentaje;
            $descuento->save();

            Session::flash('message', ['content' => 'Sección agregada con éxito', 'type' => 'success']);
            return redirect()->action([DescuentoController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }

    }

    public function edit($id){

        $descuento=Descuento::find($id);
        $categorias=categoria_prod::all();

        if (empty($descuento)) {

            Session::flash('message', ['content' => "el descuento con id '$id' no existe.", 'type' => 'error']);
            return redirect()->back();
        }

        return view('descuento/edit', ['descuento' => $descuento],['categorias'=>$categorias]);
    }

    public function update(Request $request){

        Validator::make($request->all(),[
            'descripcion' => 'required',
            'porcentaje' => 'required'
        ],
        [
            'descripcion.required' => 'La descripcion es requerido',
            'porcentaje.required' => 'El porcentaje es requerido',

        ]
        )->validate();

        try{

            $descuento=Descuento::find($request->id);

            if (!$descuento) {
               return redirect()->back()->with('error', 'Producto no encontrado.');
           }
           $descuento->categoria_id = $request->categoria_id;
           $descuento->descripcion = $request->descripcion;
           $descuento->porcentaje = $request->porcentaje;
           $descuento -> save();

            Session::flash('message', ['content' => 'Producto actualizado con éxito', 'type' => 'success']);
               return redirect()->action([DescuentoController::class, 'index']);


           } catch(Exception $ex){
               Log::error($ex);
               Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
               return redirect()->back();

           }

    }

    public function delete($id){

        $descuento=Descuento::find($id);

        $descuento->delete();

        return redirect()->action([DescuentoController::class, 'index'])
        ->with('success', 'Producto eliminado exitosamente.');
    }

}
