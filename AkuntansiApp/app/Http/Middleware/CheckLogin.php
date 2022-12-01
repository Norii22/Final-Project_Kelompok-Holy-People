<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user() == null){
            return redirect('/login');
        }
        $diff_hours = Carbon::now()->diffInHours(Carbon::parse(Session::get('timestamp')));
        if(Session::has('token_login') == false){
            return redirect('/login');
        }
        else {
            if($diff_hours > 24){
                return response()->view('login');
            }
            return $next($request);
        }
    }
}
