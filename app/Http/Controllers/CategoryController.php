<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-categories')->only('index');
        $this->middleware('permission:show-categories')->only('show');
        $this->middleware('permission:create-categories')->only(['create', 'store']);
        $this->middleware('permission:update-categories')->only(['edit', 'update']);
        $this->middleware('permission:destroy-categories')->only('destroy');
    }

    public function index()
    {
        $categories = Category::get();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            Category::create([
                'name' => $request->name,
                'observation' => $request->observation
            ]);
            return redirect()->route('categories.index')->with('success', 'Êxito: registro inserido com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não cadastrado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('categories.index')->with('error', 'Erro: registro não inserido com sucesso!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        try {
            $category->update([
                'name' => $request->name,
                'observation' => $request->observation
            ]);
            return redirect()->route('categories.index')->with('success', 'Êxito: registro atualizado com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não editado com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('categories.index')->with('error', 'Erro: registro não atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Êxito: registro excluído com sucesso!');
        } catch (Exception $e) {
            Log::notice('Registro não excluído com sucesso.', ['exception' => $e->getMessage()]);
            return redirect()->route('categories.index')->with('error', 'Erro: registro não excluído com sucesso!');
        }
    }
}
