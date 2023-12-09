<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockAssetsAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (str_contains($request->url(), '/assets') || $request->is('/assets')) {
            // Jika ditemukan, redirect ke halaman lain atau tampilkan pesan error
            return redirect('/');
            // Atau bisa juga memberikan respons error
            // return response()->json(['message' => 'Akses Ditolak'], 403);
        }
        return $next($request);
    }
}
