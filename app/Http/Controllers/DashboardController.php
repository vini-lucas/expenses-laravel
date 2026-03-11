<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DashboardController extends Controller
{
    public function index()
    {
        $name = FacadesAuth::user()->name;

        $debitos = Expense::whereNotIn('payment_method_id', [3, 2])
            ->where('user_id', FacadesAuth::id())
            ->get();

        $faturas_que_vem = Expense::where('user_id', FacadesAuth::id())
            ->where(function ($q) {
                $q->whereIn('category_id', [1, 2])
                    ->whereIn('payment_method_id', [2, 3]);
            })
            ->orWhere(function ($q) {
                $q->where('end_date', '>=', now()->addMonths(1))
                    ->whereIn('payment_method_id', [2, 3]);
            })
            ->get();

        $faturas_so_deste_mes = Expense::where('user_id', FacadesAuth::id())
            ->whereIn('payment_method_id', [3, 2])
            ->get();

        $debitos_mes_que_vem = Expense::where('user_id', FacadesAuth::id())
            ->whereIn('category_id', [1, 2])
            ->whereNotIn('payment_method_id', [2, 3])
            ->orWhere(function ($q) {
                $q->where('end_date', '>=', now()->addMonths(1))
                    ->whereNotIn('payment_method_id', [2, 3])
                    ->where('user_id', FacadesAuth::id());
            })
            ->get();

        $lembretes = Expense::whereBetween('payment_deadline_id', [
            now()->day,
            now()->addDays(6)->day
        ])->get();

        $total_debito = 0;
        $total_faturas_que_vem = 0;
        $total_faturas_so_deste_mes = 0;
        $total_debitos_mes_que_vem = 0;

        foreach ($debitos as $debito) {
            $total_debito += $debito->value;
        }

        foreach ($faturas_que_vem as $fatura_que_vem) {
            $total_faturas_que_vem += $fatura_que_vem->value;
        }

        foreach ($faturas_so_deste_mes as $fatura_so_deste_mes) {
            $total_faturas_so_deste_mes += $fatura_so_deste_mes->value;
        }

        foreach ($debitos_mes_que_vem as $debito_mes_que_vem) {
            $total_debitos_mes_que_vem += $debito_mes_que_vem->value;
        }

        $total_debito += $total_faturas_so_deste_mes;
        $total_debitos_mes_que_vem += $total_faturas_que_vem;

        dd($lembretes);

        return view('dashboard.index', [
            'name' => $name,
            'debitos' => $debitos,
            'total_debito' => $total_debito,
            'faturas_que_vem' => $faturas_que_vem,
            'faturas_so_deste_mes' => $faturas_so_deste_mes,
            'total_faturas_que_vem' => $total_faturas_que_vem,
            'total_faturas_so_deste_mes' => $total_faturas_so_deste_mes,
            'total_debitos_mes_que_vem' => $total_debitos_mes_que_vem,
            'debitos_mes_que_vem' => $debitos_mes_que_vem,
        ]);
    }
}
