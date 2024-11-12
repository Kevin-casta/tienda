<?php

namespace App\Http\Controllers;

use App\Models\categoria_prod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Cat_prodController extends Controller
{
    public function index(){
        $categoria = categoria_prod::all();
        return view('categoria/index', ['categoria' => $categoria ]);

    }

    public function create(){

        return view('categoria/create');
    }

    public function store(Request $request){

        try{
         $categoria= new categoria_prod();
         $categoria->category_name=$request -> category_name;
         $categoria -> descripcion= $request -> descripcion;
         $categoria -> save();

         return redirect()->action([Cat_prodController::class, 'index'])
                                    ->with('success', 'Categoria creado exitosamente.');


        } catch(Exception $ex){
            Log::error('Error al crear producto: ' . $ex->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al crear la Categoria.');

        }

    }

    public function edit($id){

        $categoria=categoria_prod::find($id);

        return view('categoria/edit', ['categoria' => $categoria]);
    }

    public function update(Request $request){

        try{

         $categoria=  categoria_prod::find($request->id);

         if (!$categoria) {
            return redirect()->back()->with('error', 'Categoria no encontrado.');
        }
         $categoria->category_name=$request -> category_name;
         $categoria -> descripcion= $request -> descripcion;
         $categoria -> save();

         return redirect()->action([Cat_prodController::class, 'index'])
                                    ->with('success', 'Categoria creado exitosamente.');


        } catch(Exception $ex){
            Log::error('Error al editar producto: ' . $ex->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al editar la Categoria.');

        }

    }

    public function delete($id){

        $categoria=categoria_prod::find($id);

        $categoria->delete();

        return redirect()->action([Cat_prodController::class, 'index'])
        ->with('success', 'Categoria eliminado exitosamente.');
    }
}
