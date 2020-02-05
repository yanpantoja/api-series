<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class SeriesController extends Controller
{
   public function index()
   {
        return Serie::all();
   }

   public function store(Request $request)
   {
       $serie = ['nome' => $request->nome];
       return response()->json(Serie::create($serie), 201);
   }

   public function show($id)
   {
        $serie = Serie::find($id);
        if(is_null($serie)){
            return response()->json('', 204);
        }
        return response()->json($serie, 200);
   }

   public function update($id, Request $request)
   {
        $serie = Serie::find($id);
        if(is_null($serie)){
            return response()->json([
                'erro' => 'Recurso não encontrado.'
            ], 404);
        }
        $serie->fill($request->all());
        $serie->save();

        return $serie;
   }

   public function destroy($id)
   {
       $quantidadeRecursosRemovidos = Serie::detroy($id);
       if($quantidadeRecursosRemovidos === 0) {
           return response()->json([
               'erro' => 'Recurso não encontrado'
           ], 404);
       }
       return response()->json('', 204);
   }
}
