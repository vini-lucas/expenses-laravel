<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DashboardController extends Controller
{
    public function index()
    {
        $name = FacadesAuth::user()->name;
        $debitos = Expense::where('payment_method_id', '!=', 3)->orWhere('payment_method_id', '!=', 2)->get();
        $total = 0;
        $total_proxima = 0;
        foreach ($debitos as $debito) {
            $total += $debito->value;
        }
        $parcelados = Expense::where('end_date', '>=', date('m'))->get();
        $fixas = Expense::where('category_id', 2)->get();
        foreach ($parcelados as $parcelado) {
            $total_proxima += $parcelado->value;
        }
        foreach ($fixas as $fixa) {
            $total_proxima += $fixa->value;
        }
        return view('dashboard.index', ['name' => $name, 'debitos' => $debitos, 'total' => $total, 'parcelados' => $parcelados, 'parcelados' => $parcelados, 'fixas' => $fixas, 'total_proxima' => $total_proxima]);
    }
}
