<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentMethodRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_methods = PaymentMethod::get();
        return view('payment_methods.index', ['payment_methods' => $payment_methods]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentMethodRequest $request)
    {
        try {
            PaymentMethod::create([
                'name' => $request->name
            ]);
            return redirect()->route('payment_methods.index')->with('success', 'Êxito: registro inserido com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('payment_methods.index')->with('error', 'Erro: registro não inserido com sucesso!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $payment_method)
    {
        return view('payment_methods.edit', ['payment_method' => $payment_method]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePaymentMethodRequest $request, PaymentMethod $payment_method)
    {
        try {
            $payment_method->update([
                'name' => $request->name
            ]);
            return redirect()->route('payment_methods.index')->with('success', 'Êxito: registro atualizado com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('payment_methods.index')->with('error', 'Erro: registro não atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $payment_method)
    {
        try {
            $payment_method->delete();
            return redirect()->route('payment_methods.index')->with('success', 'Êxito: registro excluído com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('payment_methods.index')->with('error', 'Erro: registro não excluído com sucesso!');
        }
    }
}
