<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;  
use App\Models\AccessLog;


class AccessLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $us, $pass): Response
    {
        //dd($request->ip());
        //Segue para a próxima requisição.
        $access_log = new AccessLog;
        $access_log->ip_address = $request->ip();
        $access_log->url = $request->url();
        $access_log->type = 'access';

        if (auth()->check()) {
            $user = auth()->user();
            $access_log->user_id = $user->id;
        }else{
            $access_log->user_id = 1;
        }
        $access_log->save();
        return $next($request);
    }
    public function index(  Request $request, Response $response)
    {
        dd($response->getStatusCode());
    }
}
