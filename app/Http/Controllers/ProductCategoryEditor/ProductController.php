<?php

namespace App\Http\Controllers\ProductCategoryEditor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;
use Storage;
use View;

use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $categories = Category::get();
        $brands = Partner::get();
        View::share(compact('categories','brands'));
    }
    public function index()
    {
        $brands = Partner::get();
        $products = Product::get();
        $categories = Category::get();
        return view('auth.products.index',compact('products','categories','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('auth.products.editcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if($request->file('image')){
            $path = $request->file('image')->store('products_images'); // image  Имя поля   products_images папка для хранения картинок
            $product_with_path =($request->all());
            $product_with_path['image'] =$path; 
            Product::create($product_with_path);
        }
       else{
        Product::create($request->all());
       }

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {    
        return view('auth.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category_id = Category::find($product->category_id);
        return View('auth.products.editcreate',compact('product','category_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {     
        if($request->file('image'))
        {
        Storage::delete($product->image);
        $path = $request->file('image')->store('products_images'); // image  Имя поля   products_images папка для хранения картинок
        $product_with_path =($request->all());
        $product_with_path['image'] =$path; 
        $product->update($product_with_path);
        }
else{
    $product->update($request->all());
}

       return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete($product);
      
       return redirect()->route('products.index');
    }
}
