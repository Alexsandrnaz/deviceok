<?php

namespace App\Http\Controllers\ProductCategoryEditor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Http\Requests\CategoryRequest;
use Storage;
use View;
class CategoryController extends Controller
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
       $categories =  Category::get();
  
      return View('auth.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('auth.categories.editcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
   if($request->file('image')){
       
        $path = $request->file('image')->store('categories_images'); // image  Имя поля   categories_images папка для хранения картинок
        $category_with_path =($request->all());
        $category_with_path['image'] =$path;   // записали в обьект путь к картинке
        Category::create($category_with_path);
   }
   else{
    Category::create($request->all());
   }

     return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return View('auth.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource. 
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return View('auth.categories.editcreate',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {              
       if($request->file('image')){
        Storage::delete($category->image);
        $path = $request->file('image')->store('categories_images'); // image  Имя поля   categories_images папка для хранения картинок
        $category_with_path =($request->all());
        $category_with_path['image'] =$path; 
        $category->update($category_with_path);
       }
       else
       {
        $category->update($request->all());
       }
        return redirect()->route('categories.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
       $category->delete();
       return redirect()->route('categories.index');
    }
}
