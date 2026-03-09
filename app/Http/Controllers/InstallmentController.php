<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstallmentRequest;
use App\Http\Requests\UpdateInstallmentRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $installments = Installment::get();
        return view('installments.index', ['installments' => $installments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('installments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:installments',
            ],
            [
                'name.required' => 'Erro: o parcelamento é obrigatório!',
                'name.unique' => 'Erro: este parcelamento já existe no banco!'
            ]
        );
        try {
            Installment::create([
                'name' => $request->name
            ]);
            return redirect()->route('installments.index')->with('success', 'Êxito: registro inserido com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('installments.index')->with('error', 'Erro: registro não inserido com sucesso!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Installment $installment)
    {
        return view('installments.edit', ['installment' => $installment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Installment $installment)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Erro: o parcelamento é obrigatório!'
            ]
        );
        try {
            $installment->update([
                'name' => $request->name
            ]);
            return redirect()->route('installments.index')->with('success', 'Êxito: registro atualizado com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('installments.index')->with('error', 'Erro: registro não atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installment $installment)
    {
        try {
            $installment->delete();
            return redirect()->route('installments.index')->with('success', 'Êxito: registro excluído com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('installments.index')->with('error', 'Erro: registro não excluído com sucesso!');
        }
    }
}
