<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use Exception;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::get(['name', 'id', 'fixed']);
        return view('expenses.index',['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        try {
            Expense::create([
                'name' => $request->name,
                'fixed' => $request->fixed,
                'value' => $request->value,
                'due_date' => $request->due_date,
                'payment_method' => $request->payment_method
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
                'fixed' => $request->fixed,
                'value' => $request->value,
                'due_date' => $request->due_date,
                'payment_method' => $request->payment_method
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
