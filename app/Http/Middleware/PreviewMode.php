<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreviewMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $previewMode = $request->session()->get('preview_mode', false) || $request->has('preview');
        
        $request->attributes->set('preview_mode', $previewMode);
        
        if ($previewMode && auth()->check() && auth()->user()->role_id === 1) {
            $request->attributes->set('show_all_content', true);
        } else {
            $request->attributes->set('show_all_content', false);
        }
        
        return $next($request);
    }
}
