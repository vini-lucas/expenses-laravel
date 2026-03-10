<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DashboardController extends Controller
{
    public function index()
    {
        $name = FacadesAuth::user()->name;

        $debitos = Expense::where('payment_method_id', '!=', 3)->where('payment_method_id', '!=', 2)->where('user_id', FacadesAuth::id())->get();
        $faturas_que_vem = Expense::where('end_date', '>=', now()->addMonths(1))->where('user_id', FacadesAuth::id())->orWhere('category_id', 1)->orWhere('category_id', 2)->where('end_date', '>=', now()->addMonths(1))->where('user_id', FacadesAuth::id())->get();
        $faturas_so_deste_mes = Expense::where('payment_method_id', 3)->where('user_id', FacadesAuth::id())->get();
        $debitos_mes_que_vem = Expense::where('category_id', 1)->where('payment_method_id', '!=', 3)->orWhere('category_id', 2)->get();

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

        return view('dashboard.index', [
            'name' => $name,
            'debitos' => $debitos,
            'total_debito' => $total_debito,
            'faturas_que_vem' => $faturas_que_vem,
            'faturas_so_deste_mes' => $faturas_so_deste_mes,
            'total_faturas_que_vem' => $total_faturas_que_vem,
            'total_faturas_so_deste_mes' => $total_faturas_so_deste_mes,
            'total_debitos_mes_que_vem' => $total_debitos_mes_que_vem,
            'debitos_mes_que_vem' => $debitos_mes_que_vem
        ]);
    }
}
