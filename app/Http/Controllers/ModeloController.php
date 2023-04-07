<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModeloController extends Controller
{
    public function index()
    {
        $modelos = Modelo::orderBy('id', 'DESC')->paginate(5);
        return view('modelo.list', ['modelos' => $modelos]);
    }

    public function create()
    {
        return view('modelo.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'montadora' => 'required'
        ]);

        if($validator->passes()) {
            $modelo = new Modelo();
            $modelo->fill($request->post())->save();

            $modelo->save();

            return redirect()->route('modelos.index')->with('success', 'Modelo cadastrada com sucesso');
        } else {
            return redirect()->route('modelos.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $modelo = Modelo::findOrFail($id);
        return view('modelo.edit', ['modelo' => $modelo]);
    }

    public function update(Modelo $modelo, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'montadora' => 'required'
        ]);

        if($validator->passes()) {
            $modelo->fill($request->post())->save();

            return redirect()->route('modelos.index')->with('success', 'Modelo atualizada com sucesso');
        } else {
            return redirect()->route('modelos.edit', $modelo->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id, Request $request)
    {
        $modelo = Modelo::findOrFail($id);
        $modelo->delete();

        return redirect()->route('modelos.index')->with('success', 'Modelo deletada com sucesso');
    }
}
