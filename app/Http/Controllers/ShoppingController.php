<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Partner;
use View;
use Illuminate\Http\Request;
use Nova\NovaApi;
use Auth;

class ShoppingController extends Controller
{

    public function __construct()
    {
        $categories = Category::get();
        $brands = Partner::get();
        View::share(compact('categories','brands'));
    }
    public function basket()
    {

        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::find($orderId);
        } else {
            $order = Order::find($orderId);
        }
      
        return view('basket', compact('order'));
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->userId = (auth()->user() ? auth()->user()->id : 0);
            $pivotRow->count++;
            $pivotRow->update();
        } else {

            $order->products()->attach($productId);
        }
        if (Auth::check()) {
            $order->userId = Auth::id();
            $order->save();
        }
        $product = Product::find($productId);
        session()->flash('success', $product->name . ' был добавлен в корзину!');
        return redirect()->route('basket');
    }

    public function basketOrder()
    {
        $nova = new NovaApi();
        $address = $nova->searchCity("Запорожье");
        $city_indexes =  $address['data'];
        $city_code = $city_indexes['0'];
        $code = $city_code['Ref'];
         $branches = $nova->getBranches($code);
  
        $branches = $branches['data'];

        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->rout('index');
        }
        $order = Order::find($orderId);
        return view('confirm', compact('order', 'address', 'branches'));
    }
    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);


        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        } else {

            $order->products()->detach($productId);
        }

        $product = Product::find($productId);
        session()->flash('decrease', $product->name . '   был удален из  корзины!');
        return redirect()->route('basket');
    }
    public function basketConfirmedOrder(Request $request)
    {
        //dd($request);
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $order->userName = $request->userName;
        $order->userPhone = $request->userPhone;
        $order->userQuestion = $request->userQuestion;
        $order->userAddress = $request->selectAddres;
        $order->userOrderStatus = 1;
        $order->userId = (auth()->user() ? auth()->user()->id : 0);
        $order->save();
        session()->forget('orderId');
        if (auth()->user()) {
            session()->flash('orderAccept',  'Поздравляем ' . auth()->user()->name . ' вы совершили покупку на сайте DeviceOK наши менеджеры свяжутся с вами в ближайшее время!');
        } else {
            session()->flash('orderAccept',  'Поздравляем  вы совершили покупку на сайте DeviceOK наши менеджеры свяжутся с вами в ближайшее время!');
        }
        return redirect()->route('index');
    }

    public function inspect($orderId){
        $order = Order::find($orderId);
       // dd($order->products());
        return view('inspect',compact('order'));
    }
}
