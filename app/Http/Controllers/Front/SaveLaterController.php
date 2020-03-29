<?php

namespace App\Http\Controllers\Front;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaveLaterController extends Controller
{
    public function destroy($id) {

        Cart::instance('saveForLater')->remove($id);

        return redirect()->back()->with('msg','L\'article a été supprimé');

    }

    public function moveToCart($id) {

        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $dubl = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($dubl->isNotEmpty()) {
            return redirect()->back()->with('msg','L\'article est enregistré pour plus tard');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

        return redirect()->back()->with('msg',' L\'article a été placé dans le panier');


    }
}
