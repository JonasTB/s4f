<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::orderBy('id', 'DESC')->paginate(5);
        return view('veiculo.list', ['veiculos' => $veiculos]);
    }

    public function create()
    {
        return view('veiculo.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'portas' => 'required',
            'model' => 'required',
            'cor' => 'required',
            'fabricante' => 'required',
            'ano_frabicacao' => 'required',
            'placa' => 'required',
            'chassi' => 'required',
            'data_criacao' => 'required'
        ]);

        if($validator->passes()) {
            $veiculo = new Veiculo();
            $veiculo->fill($request->post())->save();

            $veiculo->save();

            return redirect()->route('veiculos.index')->with('success', 'Veiculo cadastrada com sucesso');
        } else {
            return redirect()->route('veiculos.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        return view('veiculo.edit', ['veiculo' => $veiculo]);
    }

    public function update(Veiculo $veiculo, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'portas' => 'required',
            'model' => 'required',
            'cor' => 'required',
            'fabricante' => 'required',
            'ano_frabicacao' => 'required',
            'placa' => 'required',
            'chassi' => 'required',
            'data_criacao' => 'required'
        ]);

        if($validator->passes()) {
            $veiculo->fill($request->post())->save();

            return redirect()->route('veiculos.index')->with('success', 'Veiculo atualizada com sucesso');
        } else {
            return redirect()->route('veiculos.edit', $veiculo->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id, Request $request)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect()->route('veiculos.index')->with('success', 'Veiculo deletada com sucesso');
    }
}
