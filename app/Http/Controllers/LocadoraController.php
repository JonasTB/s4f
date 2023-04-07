<?php

namespace App\Http\Controllers;

use App\Models\Locadora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocadoraController extends Controller
{
    public function index()
    {
        $locadoras = Locadora::orderBy('id', 'DESC')->paginate(5);
        return view('locadora.list', ['locadoras' => $locadoras]);
    }

    public function create()
    {
        return view('locadora.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fantasia' => 'required',
            'razao_social' => 'required',
            'cnpj' => 'required',
            'email' => 'required',
            'endereco' => 'required'
        ]);

        if($validator->passes()) {
            $locadora = new Locadora();
            $locadora->fantasia = $request->fantasia;
            $locadora->razao_social = $request->razao_social;
            $locadora->cnpj = $request->cnpj;
            $locadora->email = $request->email;
            $locadora->endereco = $request->endereco;

            $locadora->save();

            return redirect()->route('locadoras.index')->with('success', 'Locadora cadastrada com sucesso');
        } else {
            return redirect()->route('locadoras.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $locadora = Locadora::findOrFail($id);
        return view('locadora.edit', ['locadora' => $locadora]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fantasia' => 'required',
            'razao_social' => 'required',
            'cnpj' => 'required',
            'email' => 'required',
            'endereco' => 'required'
        ]);

        if($validator->passes()) {
            $locadora = Locadora::find($id);
            $locadora->fantasia = $request->fantasia;
            $locadora->razao_social = $request->razao_social;
            $locadora->cnpj = $request->cnpj;
            $locadora->email = $request->email;
            $locadora->endereco = $request->endereco;

            $locadora->save();

            return redirect()->route('locadoras.index')->with('success', 'Locadora atualizada com sucesso');
        } else {
            return redirect()->route('locadoras.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id, Request $request)
    {
        $locadora = Locadora::findOrFail($id);
        $locadora->delete();

        return redirect()->route('locadoras.index')->with('success', 'Locadora deletada com sucesso');
    }
}
