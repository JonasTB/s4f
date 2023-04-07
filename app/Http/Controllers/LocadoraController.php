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
            $locadora->fill($request->post())->save();

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

    public function update(Locadora $locadora, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fantasia' => 'required',
            'razao_social' => 'required',
            'cnpj' => 'required',
            'email' => 'required',
            'endereco' => 'required'
        ]);

        if($validator->passes()) {
            $locadora->fill($request->post())->save();

            return redirect()->route('locadoras.index')->with('success', 'Locadora atualizada com sucesso');
        } else {
            return redirect()->route('locadoras.edit', $locadora->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id, Request $request)
    {
        $locadora = Locadora::findOrFail($id);
        $locadora->delete();

        return redirect()->route('locadoras.index')->with('success', 'Locadora deletada com sucesso');
    }
}
