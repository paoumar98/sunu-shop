<?php

namespace App\Http\Controllers;

use App\Exports\ProduitsExport;
use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $product = new Product();
        return view('admin.products.create', compact('product'));
    }

    public function store(Request $request) {

        $request->validate([
           'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image->getClientOriginalName()

        ]);

        $request->session()->flash('msg','Le produit a été ajouter avec success!');


        return redirect('admin/products/create');

    }

    public function edit($id) {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id) {

        $product = Product::find($id);

        $request->validate([
           'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if (file_exists(public_path('uploads/') . $product->image)) {
                unlink(public_path('uploads/') . $product->image);
            }

            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());

            $product->image = $request->image->getClientOriginalName();
        }

        $product->update([
           'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $product->image
        ]);

        $request->session()->flash('msg', 'Le produit a été mis a jour avec success!');

        return redirect('admin/products');

    }

    public function show($id) {
        $product = Product::find($id);
        return view('admin.products.details', compact('product'));
    }

    public function destroy($id) {
        Product::destroy($id);

        session()->flash('msg','Le produit a été supprimer avec success!');

        return redirect('admin/products');
    }

}
