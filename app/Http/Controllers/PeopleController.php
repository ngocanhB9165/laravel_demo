<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
class PeopleController extends Controller
{
    public function home(Request $req)
    {
        if($req->keyword){
            $products = Product::where('name','like','%'.$req->keyword.'%')->paginate(3);
            $products2 = Product::where('name','like','%'.$req->keyword.'%')->paginate(3);
        }else{
            $products = Product::offset(0)->limit(9)->get();
            $products2 = Product::offset(4)->limit(10)->get();
        }
       
        return view('font.pages.index',compact('products','products2'));
    }
}
