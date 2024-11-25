<?php

namespace App\Http\Controllers;

use App\Models\categoria_prod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class Cat_prodController extends Controller
{
    public function index(Request $request){
        if(!empty($request ->records_per_page)){
            $request -> records_per_page = $request ->records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page
                                                                                                       :env('PAGINATION_MAX_SIZE');

        } else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $categorias=categoria_prod::where('category_name', 'LIKE', '%' . $request->filter . '%')
                        ->paginate($request -> records_per_page);

        return view('categoria/index', ['categorias' => $categorias,
                                        'data'=> $request]);

    }

    public function create(){

        return view('categoria/create');
    }

    public function store(Request $request){

        Validator::make($request->all(),[
            'category_name' => 'required',
            'descripcion' => 'required'
        ],
        [
            'category_name.required' => 'El nombre es requerido',
            'descripcion.required' => 'La descripcion es requerido',

        ]
        )->validate();

        try {

            $categoria = new categoria_prod();
            $categoria->category_name = $request->category_name;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();

            Session::flash('message', ['content' => 'Sección agregada con éxito', 'type' => 'success']);
            return redirect()->action([Cat_prodController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }

    }

    public function edit($id){

        $categoria=categoria_prod::find($id);

        if (empty($categoria)) {

            Session::flash('message', ['content' => "la categoria con id '$id' no existe.", 'type' => 'error']);
            return redirect()->back();
        }

        return view('categoria/edit', ['categoria' => $categoria]);
    }

    public function update(Request $request){

        Validator::make($request->all(),[
            'category_name' => 'required',
            'descripcion' => 'required'
        ],
        [
            'category_name.required' => 'El nombre es requerido',
            'descripcion.required' => 'La descripcion es requerido',

        ]
        )->validate();

        try{

            $categoria=categoria_prod::find($request->id);

            if (!$categoria) {
               return redirect()->back()->with('error', 'Producto no encontrado.');
           }
           $categoria->category_name = $request->category_name;
           $categoria->descripcion = $request->descripcion;
           $categoria -> save();

            Session::flash('message', ['content' => 'Producto actualizado con éxito', 'type' => 'success']);
               return redirect()->action([Cat_prodController::class, 'index']);


           } catch(Exception $ex){
               Log::error($ex);
               Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
               return redirect()->back();

           }

    }

    public function delete($id){

        $categoria=categoria_prod::find($id);

        $categoria->delete();

        return redirect()->action([Cat_prodController::class, 'index'])
        ->with('success', 'Producto eliminado exitosamente.');
    }
}
