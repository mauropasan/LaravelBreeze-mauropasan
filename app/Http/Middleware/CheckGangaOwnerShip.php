<?php

namespace App\Http\Middleware;

use App\Models\Ganga;
use Closure;
use Illuminate\Http\Request;

class CheckGangaOwnerShip
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
        if (!auth()->check()) {

            if (request()->is('api*'))
            {
                return response()->json(['error' => 'No hi ha cap sessió iniciada'], 403);
            }
            abort(403);
        }

        $ganga = Ganga::findOrFail($request->route('id'));

        if ($ganga->user_id !== auth()->user()->id) {
            if (request()->is('api*'))
            {
                return response()->json(['error' => 'No tens permís per a fer aquesta acció'], 403);
            }
            abort(403);
        }

        return $next($request);
    }


}
