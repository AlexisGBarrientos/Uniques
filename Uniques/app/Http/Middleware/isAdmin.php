<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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

      $user = \Auth::user();
      if ( !$user->isAdmin() ) {
        return redirect()->back()->with(['Error', 'No posees permisos de Administrador']);
      }
        return $next($request);
    }
}
