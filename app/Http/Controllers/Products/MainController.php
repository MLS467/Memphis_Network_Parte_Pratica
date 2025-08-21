<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Service\Service;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Product::orderBy('created_at', 'desc')->get();
        // dd($data);
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $validated_form = $request->validated();

            DB::transaction(function () use ($validated_form) {
                Product::create($validated_form);
            });

            return redirect()
                ->route('products.index')
                ->with("success", "Producto cadastrado com sucesso.");
        } catch (Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e->getMessage());
            };

            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Não foi possível cadastrar o produto. Tente novamente.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('productDetails', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Service::decrypt_service($id);

        $product = Product::where('id', $id)->first();

        return view("editProduct", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductEditRequest $request, string $id)
    {
        $data_validated = $request->validated();

        try {
            Product::findOrFail($id)->update($data_validated);

            return redirect()
                ->route('products.index')
                ->with("success", "Producto Atualizado com sucesso.");
        } catch (Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e->getMessage());
            };

            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Não foi possível Atualizar o produto. Tente novamente.');
        }
    }

    public function confirm_delete(string $id): View
    {
        $id = Service::decrypt_service($id);

        $product = Product::where('id', $id)->first();

        return view("confirmDelete", compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $id = Service::decrypt_service($id);

            Product::findOrFail($id)->delete();

            return redirect()
                ->route('products.index')
                ->with('success', 'Produto excluído com sucesso!');
        } catch (Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e->getMessage());
            }

            return redirect()
                ->back()
                ->withErrors('Não foi possível excluir o produto. Tente novamente.');
        }
    }
}