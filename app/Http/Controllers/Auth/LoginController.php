<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Order;
use View;
class LoginController extends Controller
{
 
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
             $this->middleware('guest')->except('logout');
        $categories = Category::get();
        $brands = Partner::get();
        View::share(compact('categories','brands'));
      
    }
}
