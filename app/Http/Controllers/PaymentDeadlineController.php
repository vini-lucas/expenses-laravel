<?php

namespace App\Http\Controllers;

use App\Models\PaymentDeadline;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentDeadlineRequest;
use App\Http\Requests\UpdatePaymentDeadlineRequest;
use Exception;

class PaymentDeadlineController extends Controller
{
    public function index()
    {
        $payment_deadline = PaymentDeadline::get();
        return view('payments_deadline.index', ['payment_deadline' => $payment_deadline]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments_deadline.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentDeadlineRequest $request)
    {
        try {
            PaymentDeadline::create([
                'name' => $request->name
            ]);
            return redirect()->route('payments_deadline.index')->with('success', 'Êxito: registro inserido com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('payments_deadline.index')->with('error', 'Erro: registro não inserido com sucesso!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentDeadline $payment_deadline)
    {
        return view('payments_deadline.edit', ['payment_deadline' => $payment_deadline]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentDeadlineRequest $request, PaymentDeadline $payment_deadline)
    {
        try {
            $payment_deadline->update([
                'name' => $request->name
            ]);
            return redirect()->route('payments_deadline.index')->with('success', 'Êxito: registro atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('payments_deadline.index')->with('error', 'Erro: registro não atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentDeadline $payment_deadline)
    {
        try {
            $payment_deadline->delete();
            return redirect()->route('payments_deadline.index')->with('success', 'Êxito: registro excluído com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('payments_deadline.index')->with('error', 'Erro: registro não excluído com sucesso!');
        }
    }
}
