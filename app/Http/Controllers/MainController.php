<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use View;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;
use App\Models\Partner;
use App\Models\Advertising;
use Auth;
use DB;
class MainController extends Controller
{
    
    public function __construct()
    {
        $categories = Category::get();
        $brands = Partner::get();
        View::share(compact('categories','brands'));
    }

    public function home(Request $request)
    {
        $advertising = Advertising::get();
        $brands = Partner::get();
        $productsQuery = Product::query();
    
        $filters = array();
      Paginator::useBootstrap();
      foreach($brands as $key => $brand){      
        if($request->has($brand->brand))
        {         
            $filters =  array_add($filters,$key,$brand->brand);
        } 
      }

      $filtersVals = array_values($filters); //Фильтры брендов
        if($filtersVals){     
            $productsQuery->whereIn('brand', $filtersVals);
        }

      if(!is_null($request->searchStr))
      {     
        $productsQuery->where('name', 'LIKE', '%'.$request->searchStr.'%');
      }
      if($request->filled('min_price'))
      {
        $productsQuery->where('price','>=',$request->min_price);
      }
        if($request->filled('max_price'))
      {
        $productsQuery->where('price','<=',$request->max_price);
      }
     
     if($productsQuery->get()->count()<=0){
        session()->flash('noFoundResult',  'По вашему запросу " '. $request->searchStr. ' " товары не найдены!');
      
     }
     if($request->searchStr!=null || $filtersVals!=null){
        if($productsQuery->count()!=0)
        {
        session()->flash('FoundResult',  'По вашему запросу  " '. $request->searchStr. ' " найдено '.$productsQuery->count(). ' совпадений.');
        }
    }
      
    $products =  $productsQuery->get();   

        return view('home', compact('products','advertising'));
    }

    public function about()
    {
        return view('about');
    }

    public function review()
    {
        Paginator::useBootstrap();
        $reviews = Review::Paginate(3);

        return view('review', compact('reviews'));
    }
    public function reviewcomment(Request $request)
    {

        $id = auth()->user()->id;
        $review  =  Review::where('userId',  $id)->get();
        // dd($review);
        if (!is_null($request) && auth()->user()->commentState == 0) {
            $review = new Review;
            $review->userName = auth()->user()->name;
            $review->userComment = $request->comment;
            $review->userRate = $request->rating;
            $review->userEmail = auth()->user()->email;
            $review->userId = auth()->user()->id;
            $review->save();
            User::where('id', $id)->update(['commentState' => 1]);
        } else {
            Review::where('userId', $id)->update(['userRate' => $request->rating, 'userComment' => $request->comment]);
        }
        Paginator::useBootstrap();
        $reviews = Review::Paginate(3);

        return redirect()->route('review', compact('reviews'));
    }
    public function categories()
    {
        return view('categories');
    }

    public function product($category, $code = null)
    {
        $product = Product::where('code', $code)->get();
        return view('product', compact('product'));
    }
    public function category($code)
    {
        Paginator::useBootstrap();
        $category = Category::where('code', $code)->first();
        $products = $category->products()->paginate(6);
        return view('category', compact('category','products'));
    }

    public function adminpanel()
    {
       
         return view('adminpanel');

    }
    public function userorders()
    {
        Paginator::useBootstrap();
        $userOrders = Order::whereNull('userDeliveryStatus')->Paginate(2);     
         return view('userorders',compact('userOrders'));

    }
    public function userordersAll()
    {       
        Paginator::useBootstrap();
        $userOrders = Order::where('userOrderStatus',1)->Paginate(2); 
         return view('userorders',compact('userOrders'));
    }
    public function ordersDiclined()
    {
        Paginator::useBootstrap();
        $userOrders = Order::where('userDeliveryStatus',3)->Paginate(2); 
         return view('userorders',compact('userOrders'));
    }
    public function ordersAccepted()
    {
        Paginator::useBootstrap();
        $userOrders = Order::where('userDeliveryStatus',2)->Paginate(2); 
         return view('userorders',compact('userOrders'));
    }
    public function ordersInShop()
    {
        Paginator::useBootstrap();
        $userOrders = Order::where('userDeliveryStatus',5)->Paginate(2); 
         return view('userorders',compact('userOrders'));
    }
  
    public function ordersInPending()
    {
        Paginator::useBootstrap();
        $userOrders = Order::where('userDeliveryStatus',1)->Paginate(2); 
         return view('userorders',compact('userOrders'));
    }
    
    public function personalpage()
    {      
        Paginator::useBootstrap();      
        $userOrders = Order::where('userId', auth()->user()->id)->Paginate(2);          
        return view('personalpage', compact('userOrders'));
    }
  
    public function userordersAcceted($orderId)
    {
        $order = Order::find($orderId);
        $order->userDeliveryStatus = 1;
        $order->save();
        $userOrders = Order::where('userOrderStatus', 1)->get(); 
        return redirect()->route('userorders', compact('userOrders'));
    }
    public function userordersConfirm($orderId)
    {
        $order = Order::find($orderId);
        $order->userDeliveryStatus = 2;
        $order->save();
        $userOrders = Order::where('userOrderStatus', 1)->get(); 
        return redirect()->route('userorders', compact('userOrders'));
    }
    public function userordersDicline($orderId)
    {          
        $order = Order::find($orderId);
        $order->userDeliveryStatus = 3;
        $order->save();
        $userOrders = Order::where('userOrderStatus', 1)->get(); 
        return redirect()->route('userorders', compact('userOrders'));
    }
    public function userordersInshop($orderId)
    {
        $order = Order::find($orderId);
        $order->userDeliveryStatus = 5;
        $order->save();
        $userOrders = Order::where('userOrderStatus', 1)->get(); 
        return redirect()->route('userorders', compact('userOrders'));
    }
    public function userordersSearch(Request $request)
    {  
        $order = Order::find($request->serachResult); 
      
        return view('search', compact('order'));
    }
   
}