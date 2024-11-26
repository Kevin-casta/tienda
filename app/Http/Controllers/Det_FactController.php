<?php

namespace App\Http\Controllers;

use App\Models\categoria_prod;
use App\Models\Cliente;
use App\Models\detalle_factura;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Exception;

class Det_FactController extends Controller
{
    public function create(){
        $productos=Producto::all();
        $clientes=Cliente::all();
        return view('newSale/sale', compact('productos', 'clientes'));
    }

    public function store(Request $request){

        try {
            //dd($request->all());
            Log::info('Datos recibidos en la solicitud: ', $request->all());

            $factura=new Factura();
            $factura->users_id =  Auth::user()->id;
            $factura->clientes_id = $request->clientes_id;
            $factura->total=$request->total;
            $factura->save();

            $det_factura = new detalle_factura();
            $det_factura-> cantidad =$request->cantidad;
            $det_factura-> precio_unit=$request->precio_unit;
            $det_factura->facturas_id = $factura->id;
            $det_factura->productos_id=$request->productos_id;
            $det_factura->save();



            Session::flash('message', ['content' => 'Factura Generada con éxito', 'type' => 'success']);
            return redirect()->back();

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }
 }
