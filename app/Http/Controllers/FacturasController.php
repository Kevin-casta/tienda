<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



use Exception;

class FacturasController extends Controller
{

    public function create(){
        $clientes = Cliente::all();

        return view('factura.create', compact('clientes'));
    }

    public function store(Request $request){

        try {

            $factura = new Factura();
            $factura->total = $request->total;
            $factura->users_id =  Auth::user()->id;
            $factura->clientes_id = $request->clientes_id;

            $factura->save();

            Session::flash('message', ['content' => 'Factura agregada con éxito', 'type' => 'success']);
            return redirect()->action([facturasController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function index(Request $request){
        if(!empty($request ->records_per_page)){
            $request -> records_per_page = $request ->records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page
                                                                                                       :env('PAGINATION_MAX_SIZE');

        } else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $promocion=Factura::where('id', 'LIKE', '%' . $request->filter . '%')
                        ->paginate($request -> records_per_page);

        return view('factura/index', ['facturas' => $promocion,
                                        'data'=> $request]);

    }


    public function edit($id){

        $factura=Factura::find($id);

        if (empty($factura)) {

            Session::flash('message', ['content' => "El producto con id '$id' no existe.", 'type' => 'error']);
            return redirect()->back();
        }

        return view('factura/edit', ['factura' => $factura]);
    }


    public function update(Request $request){

        try{

         $factura=  Factura::find($request->id);

         if (!$factura) {
            return redirect()->back()->with('error', 'factura no encontrado.');
        }

        $factura->total = $request->total;
        $factura -> save();

        Session::flash('message', ['content' => 'factura actualizado con éxito', 'type' => 'success']);
            return redirect()->action([FacturasController::class, 'index']);


        } catch(Exception $ex){
            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();

        }

    }

    public function delete($id){

        $factura=Factura::find($id);

        $factura->delete();

        return redirect()->action([FacturasController::class, 'index'])
        ->with('success', 'promocion eliminado exitosamente.');
    }
}
