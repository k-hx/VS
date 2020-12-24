<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use Session;

class ProductController extends Controller
{
    //
    public function create() {
        return view('insertProduct') ->with('categories',Category::all());
    }

    public function store(){    //step 2 
        $r=request(); //step 3 get data from HTML
        $image=$r->file('product-image');  
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();

        $addCategory=Product::create([    //step 3 bind data
            'id'=>$r->ID, //add on 
            'name'=>$r->name, //fullname from HTML
            'description'=>$r->description,
            'categoryID'=>$r->category,
            'price'=>$r->price,
            'quantity'=>$r->quantity,
            'image'=>$imageName,
        ]);
    
        Session::flash('success',"Product create successful!");
        
        return redirect()->route('showProduct');
    }

    public function show() {
        $products=Product::paginate(4);
        return view('showProduct')->with('products',$products);
    }

    public function edit($id){
       
        $products =Product::all()->where('id',$id);
        //select * from products where id='$id'
        
        return view('editProduct')->with('products',$products)
                                ->with('categories',Category::all());
    }

    public function delete($id) {
        $products=Product::find($id);
        $products->delete();
        return redirect()->route('showProduct');
    }

    public function search(){
        $r=request();
        $keyword=$r->searchProduct;
        $products =DB::table('products')
        ->leftjoin('categories', 'categories.id', '=', 'products.categoryID')
        ->select('categories.name as catname', 'categories.id as catid', 'products.*')
        ->where('products.name', 'like', '%' . $keyword . '%')
        ->orWhere('products.description', 'like', '%' . $keyword . '%')
        //->get();
        ->paginate(4);
        
        return view('showProduct')->with('products', $products);
    }

    //customer product view page
    public function customerView() {
        $products=Product::paginate(3);
        return view('customerProductView')->with('products',$products);
    }

    public function customerSearch(){
        $r=request();//retrive submited form data
        $keyword=$r->searchProduct;
        $products =DB::table('products')
        ->leftjoin('categories', 'categories.id', '=', 'products.categoryID')
        ->select('categories.name as catname','categories.id as catid','products.*')
        ->where('products.name', 'like', '%' . $keyword . '%')
        ->orWhere('products.description', 'like', '%' . $keyword . '%')   
        //->get();
        ->paginate(3);

        return view('customerProductView')->with('products',$products);

    }

    //---------------------------------------------------------------------------

    public function showProducts(){
        $products=Product::paginate(12);
        
        return view('products')->with('products',$products);
    }

    public function showProductDetail($id){
       
        $products =Product::all()->where('id',$id);
        //select * from products where id='$id'
        
        return view('productDetail')->with('products',$products)
                                ->with('categories',Category::all());
    }

    public function index() {
        return view('search');
    }

    public function autocomplete(Request $request) {
        $data = Product::select("name")
            ->where("name","LIKE", '%'.$request->get('query').'%')
            ->get();
        return response()->json($data);
    }

}​​



