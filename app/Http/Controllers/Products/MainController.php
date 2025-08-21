<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
            echo $e;
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
        $id = Crypt::decrypt($id);

        $product = Product::where('id', $id)
            ->first();

        return view("editProduct", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}