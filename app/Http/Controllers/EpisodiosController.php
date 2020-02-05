<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Episodio;

class EpisodiosController extends Controller
{
   public function index()
   {
        return Episodio::all();
   }

   public function store(Request $request)
   {
       $episodio = ['nome' => $request->nome];
       return response()->json(Episodio::create($episodio), 201);
   }

   public function show($id)
   {
        $episodio = Episodio::find($id);
        if(is_null($episodio)){
            return response()->json('', 204);
        }
        return response()->json($episodio, 200);
   }

   public function update($id, Request $request)
   {
        $episodio = Episodio::find($id);
        if(is_null($episodio)){
            return response()->json([
                'erro' => 'Recurso não encontrado.'
            ], 404);
        }
        $episodio->fill($request->all());
        $episodio->save();

        return $episodio;
   }

   public function destroy($id)
   {
       $quantidadeRecursosRemovidos = Episodio::detroy($id);
       if($quantidadeRecursosRemovidos === 0) {
           return response()->json([
               'erro' => 'Recurso não encontrado'
           ], 404);
       }
       return response()->json('', 204);
   }
}
