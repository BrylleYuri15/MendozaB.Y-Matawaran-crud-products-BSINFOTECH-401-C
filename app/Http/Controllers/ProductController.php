<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', data: compact(var_name: 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View
    {
        return view(view: 'products.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(rules: [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile(key: 'image')) {
            $data['image'] = $request->file(key: 'image')->store(path: 'products', options: 'public');
        }

        Product::create(attributes: $data);

        return redirect()->route(route: 'products.index')->with(key: 'success', value: 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product):Factory|View
    {
        return view(view: 'products.show', data: compact(var_name: 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Factory|View
    {
        return view(view: 'products.edit', data: compact(var_name: 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $data = $request->validate(rules: [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile(key: 'image')) {
            if ($product->image) {
                Storage::disk(name: 'public')->delete(paths: $product->image);
            }
            $data['image'] = $request->file(key: 'image')->store(path: 'products', options: 'public');
        }

        $product->update(attributes: $data);

        return redirect()->route(route: 'products.index')->with(key: 'success', value: 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        if ($product->image) {
            Storage::disk(name: 'public')->delete(paths: $product->image);
        }
        $product->delete();

        return redirect()->route(route: 'products.index')->with(key: 'success', value: 'Product deleted successfully.');
    
    }
}