<?php

namespace App\Http\Controllers;
use App\Models\Advertising;
use Illuminate\Http\Request;
use Storage;
use View;
use App\Models\Category;
use App\Models\Partner;
use  App\Http\Requests\AdvertisingRequest;
class AdvertisingController extends Controller
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
        
        $advertisings = Advertising::get();
        return view('auth.advertising.index', compact('advertisings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('auth.advertising.editcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisingRequest $request)
    {
        if($request->file('image')){
       
            $path = $request->file('image')->store('adverstising_images'); 
            $adverstising_with_path =($request->all());
            $cadverstising_with_path['image'] =$path;   
            Advertising::create($adverstising_with_path);
       }
       else{
             Advertising::create($request->all());
       }
    
         return redirect()->route('advertising.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertising $advertising)
    {
        return View('auth.advertising.editcreate',compact('advertising'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisingRequest $request, Advertising $advertising)
    {
        if($request->file('image')){
            Storage::delete($advertising->image);
            $path = $request->file('image')->store('advertising_images'); 
            $advertising_with_path =($request->all());
            $advertising_with_path['image'] =$path; 
            $advertising->update($advertising_with_path);
           }
           else
           {
            $advertising->update($request->all());
           }
            return redirect()->route('advertising.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising)
    {
        Storage::delete($advertising->image);
        $advertising->delete();
        return redirect()->route('advertising.index');
    }
}
