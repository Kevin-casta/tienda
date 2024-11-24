<?php

namespace App\Http\Controllers;

use App\Models\categoria_prod;
use App\Models\detalle_factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Exception;

class Det_FactController extends Controller
{
    public function create(){
        $categorias=categoria_prod::all();
        return view('newSale/sale', compact('categorias'));
    }

    /*public function store(Request $request){

        try {

            $factura = new detalle_factura();
            $factura-> cantidad =$request->cantidad;
            $factura-> precio_unit=$request->precio_unit;
            $factura->total = $request->total;
            $factura->save();

            Session::flash('message', ['content' => 'Factura agregada con éxito', 'type' => 'success']);
            return redirect()->action([facturasController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }*/
 }
