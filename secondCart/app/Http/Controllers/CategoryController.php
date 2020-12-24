<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category; //step 1 link model (Laravel 8)

class CategoryController extends Controller
{
    //
    public function store() { //step 2
        $r=request(); //step 3 get data from HTML
        $addCategory=Category::create([ //step 4 bind data
            'id'=>$r->ID,
            'name'=>$r->name, 
        ]);

        Return view('insertCategory'); //step 5 back to last page
    }

    public function show() {
        $categories=Category::all(); //all -> select all from category
        return view('showCategory')->with('categories',$categories);
    }

    public function delete($id) {
        $categories=Category::find($id);
        $categories->delete(); //apply delete from categories where id='$id'
        return redirect()->route('showCategory');        
    }
}
