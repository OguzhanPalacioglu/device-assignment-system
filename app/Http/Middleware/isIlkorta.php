<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isIlkorta
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
         // Eğer Kullanıcı İlköğretim yönetisici değilse değilse dashboard sayfasına yönlendir. Bu koddan sonra Kernel.php route tanımlamak gerekli.!
        
        
        if(auth()->user()->type!=='ilkogretim')
        {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
