<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\MyCart;
Use Session;
Use Auth;

class CartController extends Controller
{
    //
    public function _construct() {
        $this->middleware('auth');
    }

    public function add() {
        $r=request();
        $addCategory=MyCart::create([
            'quantity'=>$r->quantity,
            'orderID'=>'',
            'productID'=>$r->id, 
            'userID'=>Auth::id(),
        ]);

        Session::flash('success',"Product add successful!");
        Return redirect()->route('products');
    }

    public function showMyCart() {
        $carts=DB::table('my_carts')
        ->leftjoin('products', 'products.id', '=', 'my_carts.productID')
        ->select('my_carts.quantity as cartQty','my_carts.id as cartID', 'products.*')
        ->where('my_carts.orderID','=','') // '' -> haven't make payment
        ->paginate(12);

        return view('myCart')->with('carts',$carts);
    }

    public function deleteItem($id) {
        $carts=MyCart::find($id);
        $carts->delete();
        return redirect()->route('show.myCart');
    }
}
