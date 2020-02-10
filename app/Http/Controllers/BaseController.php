<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{
    protected $class;

    public function index()
    {
        return $this->class::all();
    }

    public function store(Request $request)
    {
        $recurso = ['nome' => $request->nome];
        return response()->json($this->class::create($recurso), 201);
    }

    public function show($id)
    {
        $recurso = $this->class::find($id);
        if(is_null($recurso)){
            return response()->json('', 204);
        }
        return response()->json($recurso, 200);
    }

    public function update($id, Request $request)
    {
        $recurso = $this->class::find($id);
        if(is_null($recurso)){
            return response()->json([
                'erro' => 'Recurso não encontrado.'
            ], 404);
        }
        $recurso->fill($request->all());
        $recurso->save();

        return $recurso;
    }

    public function destroy($id)
    {
       $quantidadeRecursosRemovidos = $this->class::detroy($id);
       if($quantidadeRecursosRemovidos === 0) {
           return response()->json([
               'erro' => 'Recurso não encontrado'
           ], 404);
       }
       return response()->json('', 204);
    }
}
