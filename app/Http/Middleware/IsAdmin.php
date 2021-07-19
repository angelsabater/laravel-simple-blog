<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IsAdmin
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
        $role = Role::select('id')
            ->where('role', '=', 'admin')->first();

        if (Auth::user() && Auth::user()->role_id == $role->id)
        {
            return $next($request);
        }

        return redirect('/dashboard');
    }
}
