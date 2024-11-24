<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
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
