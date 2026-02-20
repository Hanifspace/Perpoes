<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle(Request $request, Closure $next, $role): Response
{
    $roles = explode('|', $role);

    $user = $request->user(); // ini null kalau belum login
    if (!$user || !$user->hasRole($roles)) {
        return redirect('eror.index');
    }

    return $next($request);
}
}