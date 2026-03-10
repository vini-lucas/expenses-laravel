<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCardRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-cards')->only('index');
        $this->middleware('permission:show-cards')->only('show');
        $this->middleware('permission:create-cards')->only(['create', 'store']);
        $this->middleware('permission:update-cards')->only(['edit', 'update']);
        $this->middleware('permission:destroy-cards')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('Super Admin')) {
            $cards = Card::get();
        } else {
            $cards = Card::where('user_id', $user->id)->get();
        }
        
        return view('cards.index', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        try {
            Card::create([
                'bank' => $request->bank,
                'end' => $request->end,
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('cards.index')->with('success', 'Êxito: registro inserido com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('cards.index')->with('error', 'Erro: registro não inserido com sucesso!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        return view('cards.edit', ['card' => $card]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCardRequest $request, Card $card)
    {
        try {
            $card->update([
                'bank' => $request->bank,
                'end' => $request->end,
            ]);
            return redirect()->route('cards.index')->with('success', 'Êxito: registro atualizado com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('cards.index')->with('error', 'Erro: registro não atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        try {
            $card->delete();
            return redirect()->route('cards.index')->with('success', 'Êxito: registro excluído com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('cards.index')->with('error', 'Erro: registro não excluído com sucesso!');
        }
    }
}
