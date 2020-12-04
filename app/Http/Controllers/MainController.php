<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
  
    }
    public function about()
    {
        return view('about');
    }

    public function review()
    {
        return view('review');
    }
    public function categories()
    {
        return view('categories');
    }
    public function products()
    {
         return view('products');
    }
    public function product($product=null)
     {
      
       return view('product',['product'=>$product]);
    }
    public function category($category)
    {
      
        return view('category',['category'=>$category]);
    }
}
