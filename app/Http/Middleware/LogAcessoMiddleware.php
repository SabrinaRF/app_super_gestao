<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
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
        // $request - manipular
        //return $next($request);
        
        $IP = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        
        LogAcesso::create(['log'=> "IP $IP requisitou a rota $rota"]);

        return $next($request);
        //return Response('MIDDLEWARE');
    }
}
