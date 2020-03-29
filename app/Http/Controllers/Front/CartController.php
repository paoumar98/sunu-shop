<?php

namespace App\Http\Controllers\Front;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index() {
        return view('front.cart.index');
    }

    public function store(Request $request) {

        $dubl = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($dubl->isNotEmpty()) {
            return redirect()->back()->with('msg','L\'article est deja  dans votre panier');
        }

        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');

        return redirect()->back()->with('msg','L\'article a ete ajouter dans votre panier');

    }

    public function destroy($id) {

        Cart::remove($id);

        return redirect()->back()->with('msg','L\'article a été supprimer de votre panier');

    }

    public function saveLater($id) {

        $item = Cart::get($id);

        Cart::remove($id);

        $dubl = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($dubl->isNotEmpty()) {
            return redirect()->back()->with('msg','L\'article a été enregistré pour plus tard');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

        return redirect()->back()->with('msg','L\'article a été enregistré pour plus tard');

    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between: 1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors','La quantité doit etre comprix entre 1 et 5');
            return response()->json(['success' => false]);
        }

        Cart::update($id, $request->quantity);

        session()->flash('msg','La quantité doit etre comprix entre 1 et 5');

        return response()->json(['success' => true]);

    }


}
