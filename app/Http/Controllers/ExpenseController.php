<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use Exception;

use App\Models\PaymentDeadline;
use App\Models\Installment;
use App\Models\PaymentMethod;
use App\Models\Category;
use App\Models\Card;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::get(['id', 'name', 'value']);
        return view('expenses.index', ['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payments_deadline = PaymentDeadline::get(['name', 'id']);
        $installments = Installment::orderBy('name', 'DESC')->get(['name', 'id']);
        $payment_methods = PaymentMethod::get(['name', 'id']);
        $categories = Category::get(['name', 'id']);
        $cards = Card::get(['bank', 'id']);

        return view('expenses.create', [
            'payments_deadline' => $payments_deadline,
            'installments' => $installments,
            'payment_methods' => $payment_methods,
            'categories' => $categories,
            'cards' => $cards
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        try {
            Expense::create([
                'name' => $request->name,
                'value' => $request->value,
                'due_date' => $request->due_date,
                'payment_deadline_id' => $request->payment_deadline_id,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
                'card_id' => $request->card_id
            ]);
            $id = Expense::orderBy('id', 'DESC')->first();
            return redirect()->route('expenses.show', ['expense' => $id])->with('success', 'Êxito: registro inserido com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('expenses.index')->with('error', 'Erro: registro não inserido com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', ['expense' => $expense]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', ['expense' => $expense]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        try {
            $expense->update([
                'name' => $request->name,
                'value' => $request->value,
                'due_date' => $request->due_date,
                'payment_deadline_id' => $request->payment_deadline_id,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
                'card_id' => $request->card_id
            ]);
            $id = Expense::where('id', $expense->id)->first();
            return redirect()->route('expenses.show', ['expense' => $id])->with('success', 'Êxito: registro atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('expenses.index')->with('error', 'Erro: registro não atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        try {
            $expense->delete();
            return redirect()->route('expenses.index')->with('success', 'Êxito: registro excluído com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('expenses.index')->with('error', 'Erro: registro não excluído com sucesso!');
        }
    }
}
