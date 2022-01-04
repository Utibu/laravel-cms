<?php

namespace App\Http\Middleware;

use App\Models\Site;
use Closure;
use Illuminate\Http\Request;

class CheckSiteValidity
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
        $domain = $request->route('domain');
        if(!empty($domain)) {
          $site = Site::where('slug', $domain)->first();
          if(!empty($site)) {
            $request->attributes->add(['site_id' => $site->id]);
            return $next($request);
          }
        }

        return abort(404);
    }
}
