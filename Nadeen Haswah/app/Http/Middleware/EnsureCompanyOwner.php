<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class EnsureCompanyOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // هذا الأفضل: استخدمي Facade Auth
        if (!Auth::check() || !Auth::user()->isCompanyOwner()) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
