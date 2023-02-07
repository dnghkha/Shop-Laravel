<?php

namespace App\Http\Middleware;

use App\Models\Func;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class CheckRoleAdmin
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
        $route = $request->route()->getName();
        $uid = auth()->user()->id;
        $func = Func::where(['route' => $route, 'status' => 1])->first();
        if (!$func)
            return redirect()->route('deny');

        $check = Role::where(['user_id' => $uid, 'func_id' => $func->id])->first();
        if ($check)
            return $next($request);
        else
            return redirect()->route('deny');
    }
}
