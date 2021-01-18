<?php

namespace App\Http\Controllers;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\Category;
use Storage;
use View;
class PartnerController extends Controller
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
        $partners =  Partner::get();
  
        return View('auth.partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('auth.partners.editcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('image')){
       
            $path = $request->file('image')->store('partners_images');
            $partners_with_path =($request->all());
            $partners_with_path['image'] =$path;   
            Partner::create($partners_with_path);
       }
       else{
        Partner::create($request->all());
       }
    
         return redirect()->route('partners.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return View('auth.partners.show',compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return View('auth.partners.editcreate',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Partner $partner)
    {
        if($request->file('image')){
            Storage::delete($partner->image);
            $path = $request->file('image')->store('partners_images'); 
            $partner_with_path =($request->all());
            $partner_with_path['image'] =$path; 
            $partner->update($partner_with_path);
           }
           else
           {
            $partner->update($request->all());
           }
            return redirect()->route('partners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        Storage::delete($partner->image);
       $partner->delete();
       return redirect()->route('partners.index');
    }
}
