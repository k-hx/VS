<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use Session;

class ProductController extends Controller
{
    public function create() {
        return view('insertProduct')->with('categories',Category::all());
    }

    public function store() {
        $r=request();
        $image=$r->file('product-image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();

        $addProduct=Product::create([
            'name'=>$r->name,
            'description'=>$r->description,
            'categoryID'=>$r->category,
            'price'=>$r->price,
            'image'=>$imageName,
        ]);

        Session::flash('success',"Product added successfully!");

        return redirect()->route('showProduct');
    }

    public function show() {
        $products=Product::paginate(3);
        return view('showProduct')->with('products',$products);
    }

    public function edit($id) {
        $products=Product::all()->where('id',$id);
        return view('editProduct')->with('products',$products)
                                ->with('categories',Category::all());
    }

    public function delete($id) {
        $products=Product::find($id);
        $products->delete();
        return redirect()->route('showProduct');
    }

    public function update() {
        $r=request();
        $products=Product::find($r->ID);
        if($r->file('product-image')!='') {
            $image=$r->file('product-image');
            $image->move('images',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            $products->image=$imageName;
        }
        $products->name=$r->name;
        $products->description=$r->description;
        $products->price=$r->price;
        $products->categoryID=$r->category;
        $products->save();
        return redirect()->route('showProduct');
    }

    public function search() {
        $r=request();
        $keyword=$r->searchProduct;
        $products=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.categoryID')
        ->select('categories.name as catname','categories.id as catid','products.*')
        ->where('products.name','like','%'.$keyword.'%')
        ->orWhere('products.description','like','%'.$keyword.'%')
        ->paginate(3);
        
        return view('showProduct')->with('products',$products);
    }

    public function showProducts() {
        $products=Product::paginate(12);
        
        return view('products')->with('products',$products);
    }

    public function showProductDetail($id) {
        $products=Product::all()->where('id',$id);
        return view('productDetail')->with('products',$products)
                                    ->with('categories',Category::all());
    }
}
