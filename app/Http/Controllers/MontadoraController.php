<?php

namespace App\Http\Controllers;

use App\Models\Montadora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MontadoraController extends Controller
{
    public function index()
    {
        $montadoras = Montadora::orderBy('id', 'DESC')->paginate(5);
        return view('montadora.list', ['montadoras' => $montadoras]);
    }

    public function create()
    {
        return view('montadora.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required'
        ]);

        if($validator->passes()) {
            $montadora = new Montadora();
            $montadora->fill($request->post())->save();

            $montadora->save();

            return redirect()->route('montadoras.index')->with('success', 'Montadora cadastrada com sucesso');
        } else {
            return redirect()->route('montadoras.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $montadora = Montadora::findOrFail($id);
        return view('montadora.edit', ['montadora' => $montadora]);
    }

    public function update(Montadora $montadora, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required'
        ]);

        if($validator->passes()) {
            $montadora->fill($request->post())->save();

            return redirect()->route('montadoras.index')->with('success', 'Montadora atualizada com sucesso');
        } else {
            return redirect()->route('montadoras.edit', $montadora->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id, Request $request)
    {
        $montadora = Montadora::findOrFail($id);
        $montadora->delete();

        return redirect()->route('montadoras.index')->with('success', 'Montadora deletada com sucesso');
    }
}
