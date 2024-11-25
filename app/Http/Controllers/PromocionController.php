<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PromocionController extends Controller
{
    public function index(Request $request){
        if(!empty($request ->records_per_page)){
            $request -> records_per_page = $request ->records_per_page <= env('PAGINATION_MAX_SIZE') ? $request -> records_per_page
                                                                                                       :env('PAGINATION_MAX_SIZE');

        } else{
            $request -> records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $promocion=Promocion::where('productos_id', 'LIKE', '%' . $request->filter . '%')
                        ->paginate($request -> records_per_page);

        return view('promocion/index', ['promocions' => $promocion,
                                        'data'=> $request]);

    }

    public function create()
    {
        $productos = Producto::all();

        return view('promocion.create', compact('productos'));
    }


    public function store(Request $request)
    {
        try {
            $existingPromotion = Promocion::where('productos_id', $request->productos_id)->first();

            if ($existingPromotion) {
                return redirect()->back()->withErrors(['productos_id' => 'Este producto ya tiene una promoción asociada.']);
            }

            $promocion = new Promocion();
            $promocion->descripcion = $request->DESCRIPCION;
            $promocion->productos_id = $request->productos_id; 
            $promocion->save();

            Session::flash('message', ['content' => 'Promoción agregada con éxito', 'type' => 'success']);
            return redirect()->route('promocion.index'); 

        } catch (Exception $ex) {
            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }


    public function edit($id){

        $promocion=Promocion::find($id);

        if (empty($promocion)) {

            Session::flash('message', ['content' => "El producto con id '$id' no existe.", 'type' => 'error']);
            return redirect()->back();
        }

        return view('promocion/edit', ['promocion' => $promocion]);
    }


    public function update(Request $request){

        try{

         $promocion=  Promocion::find($request->id);

         if (!$promocion) {
            return redirect()->back()->with('error', 'promocion no encontrado.');
        }

        $promocion->descripcion = $request->DESCRIPCION;
        $promocion -> save();

        Session::flash('message', ['content' => 'Promocion actualizado con éxito', 'type' => 'success']);
            return redirect()->action([PromocionController::class, 'index']);


        } catch(Exception $ex){
            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();

        }

    }

    public function delete($id){

        $promocion=Promocion::find($id);

        $promocion->delete();

        return redirect()->action([PromocionController::class, 'index'])
        ->with('success', 'promocion eliminado exitosamente.');
    }


}
