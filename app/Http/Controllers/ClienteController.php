<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    public function index(Request $request){
        if(!empty($request ->records_per_page)){
            $request -> records_per_page = $request ->records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page
                                                                                                       :env('PAGINATION_MAX_SIZE');

        } else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $clientes=Cliente::where('NOMBRE', 'LIKE', '%' . $request->filter . '%')
                        ->paginate($request -> records_per_page);

        return view('cliente/index', ['clientes' => $clientes,
                                        'data'=> $request]);

    }

    public function create(){

        return view('cliente/create');
    }

    public function store(Request $request){

        Validator::make($request->all(),[
            'NOMBRE' => 'required',
            'TELEFONO' => 'required'
        ],
        [
            'NOMBRE.required' => 'El nombre es requerido',
            'TELEFONO.required' => 'El telefono es requerido',

        ]
        )->validate();

        try {

            $cliente = new Cliente();
            $cliente->NOMBRE = $request->NOMBRE;
            $cliente->TELEFONO = $request->TELEFONO;
            $cliente->save();

            Session::flash('message', ['content' => 'Sección agregada con éxito', 'type' => 'success']);
            return redirect()->action([ClienteController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }

    }
    public function edit($id){

        $cliente=Cliente::find($id);

        if (empty($cliente)) {

            Session::flash('message', ['content' => "el cliente con id '$id' no existe.", 'type' => 'error']);
            return redirect()->back();
        }

        return view('cliente/edit', ['cliente' => $cliente]);
    }

    public function update(Request $request){

        Validator::make($request->all(),[
            'NOMBRE' => 'required',
            'TELEFONO' => 'required'
        ],
        [
            'NOMBRE.required' => 'El nombre es requerido',
            'TELEFONO.required' => 'El telefono es requerido',

        ]
        )->validate();

        try{

            $cliente=Cliente::find($request->id);

            if (!$cliente) {
               return redirect()->back()->with('error', 'Producto no encontrado.');
           }
           $cliente->NOMBRE = $request->NOMBRE;
           $cliente->TELEFONO = $request->TELEFONO;
           $cliente -> save();

            Session::flash('message', ['content' => 'Producto actualizado con éxito', 'type' => 'success']);
               return redirect()->action([ClienteController::class, 'index']);


           } catch(Exception $ex){
               Log::error($ex);
               Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
               return redirect()->back();

           }

    }

    public function delete($id){

        $cliente=Cliente::find($id);

        $cliente->delete();

        return redirect()->action([ClienteController::class, 'index'])
        ->with('success', 'Producto eliminado exitosamente.');
    }


}
