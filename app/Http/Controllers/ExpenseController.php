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
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::get();
        return view('expenses.index', ['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payments_deadline = PaymentDeadline::get(['name', 'id']);
        $installments = Installment::orderBy('id', 'ASC')->get(['name', 'id']);
        $payment_methods = PaymentMethod::where('name', '!=', 'Crédito')->get(['name', 'id']);
        $categories = Category::get(['name', 'id', 'observation']);
        $cards = Card::where('user_id', Auth::user()->id)->get();

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
                'user_id' => Auth::user()->id,
                'payment_deadline_id' => $request->payment_deadline_id,
                'card_id' => (($request->payment_method_id >= 6) ? ($request->payment_method_id) : (null)),
                'category_id' => $request->category_id,
                'payment_method_id' => $request->payment_method_id >= 6 ? 3 : $request->payment_method_id,
                'installment_id' => $request->installment_id
            ]);

            if ($request->payment_method_id >= 6) {
                $card_up = Card::where('id', $request->payment_method_id)->first();
                $card_up->update([
                    'current_invoice' => $card_up->current_invoice + $request->value
                ]);
                $history = $card_up->invoice_history;

                $history[] = [
                    $request->name => $request->value
                ];

                $card_up->invoice_history = $history;

                $card_up->save();
            }
            return redirect()->route('expenses.index')->with('success', 'Êxito: registro inserido com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('expenses.index')->with('error', 'Erro: registro não inserido com sucesso!' . $e->getMessage());
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
        $payments_deadline = PaymentDeadline::get(['name', 'id']);
        $installments = Installment::orderBy('id', 'ASC')->get(['name', 'id']);
        $payment_methods = PaymentMethod::where('name', '!=', 'Crédito')->get(['name', 'id']);
        $categories = Category::get(['name', 'id', 'observation']);
        $cards = Card::where('user_id', Auth::user()->id)->get();
        return view('expenses.edit', [
            'expense' => $expense,
            'payments_deadline' => $payments_deadline,
            'installments' => $installments,
            'payment_methods' => $payment_methods,
            'categories' => $categories,
            'cards' => $cards
        ]);
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
                'user_id' => Auth::user()->id,
                'payment_deadline_id' => $request->payment_deadline_id,
                'card_id' => (($request->payment_method_id >= 6) ? ($request->payment_method_id) : (null)),
                'category_id' => $request->category_id,
                'installment_id' => $request->installment_id,
                'payment_method_id' => $request->payment_method_id >= 6 ? 3 : $request->payment_method_id,
            ]);
            $id = Expense::where('id', $expense->id)->first();
            return redirect()->route('expenses.index')->with('success', 'Êxito: registro atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('expenses.index')->with('error', 'Erro: registro não atualizado com sucesso!' . $e->getMessage());
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
