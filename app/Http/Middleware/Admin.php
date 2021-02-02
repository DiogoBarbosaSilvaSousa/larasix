<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){

            $userId = Auth::id();

            $roles = User::find($userId);



            foreach ($roles->roles as $role) {

                if($role->name == 'administrator') {
                    return $next($request);
                }

            }

        }

        return redirect('login')->with('success', 'you need to login as admin to access admin Dashboard');

    }
}
