<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class AdminRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if(!$user->adminRight()){
            session()->flash('notHaveRight','Попытка перейти  на страницу для просмотра которой у Вас не достаточно прав администратора.');
           return redirect()->route('home');
        }
        return $next($request);
    }
}
