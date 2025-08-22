<?php

namespace App\Http\Controllers\Products;

use App\Exceptions\AppException;
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
    public function create(): View
    {
        return view('newProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $validated_form = $request->validated();

            if ($request->hasFile('photo')) {
                $validated_form['photo'] = Service::save_photo($request);
            }

            DB::transaction(function () use ($validated_form) {
                Product::create($validated_form);
            });

            return redirect()
                ->route('products.index')
                ->with("success", "Produto cadastrado com sucesso.");
        } catch (Exception $e) {
            throw new AppException("Não foi possível cadastrar o produto. Tente novamente.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('productDetails', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $id = Service::decrypt_service($id);

        $product = Product::where('id', $id)->first();

        return view("editProduct", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductEditRequest $request, Product $product)
    {

        $data_validated = $request->validated();

        if ($request->hasFile('photo')) {
            $data_validated['photo'] = Service::save_photo($request);
        }

        try {
            $product->update($data_validated);

            return redirect()
                ->route('products.index')
                ->with("success", "Produto Atualizado com sucesso.");
        } catch (Exception $e) {
            throw new AppException("Não foi possível Atualizar o produto. Tente novamente.");
        }
    }

    public function confirm_delete(string $id): View
    {
        $id = Service::decrypt_service($id);

        $product = Product::findOrFail($id);

        return view("confirmDelete", compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $id = Service::decrypt_service($id);

            Product::findOrFail($id)->delete();

            return redirect()
                ->route('products.index')
                ->with('success', 'Produto excluído com sucesso!');
        } catch (Exception $e) {
            throw new AppException("Não foi possível excluir o produto. Tente novamente.");
        }
    }
}