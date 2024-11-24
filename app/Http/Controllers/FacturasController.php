<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



use Exception;

class FacturasController extends Controller
{

    public function create(){

        return view('newSale/sale');
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
}
