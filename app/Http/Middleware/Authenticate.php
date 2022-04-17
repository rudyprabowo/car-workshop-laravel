<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    //untuk cookie
    public function handle($request, Closure $next, ...$guards)
    {
        //Add token to header
        if($jwt = $request->cookie('jwt')){
            $request->headers->set('Authorization', 'Bearer '. $jwt);
        }
        
        $this->authenticate($request, $guards);
        
        return $next($request);
        //aslinya ^
        
        //tes
        
        // $jwt = $request->cookie('jwt');
        
        // $token='Bearer '.$jwt;
        // $response=$next($request);
        // // $response->header('Authorization',$token);
        // $request->headers->set('Authorization', 'Bearer '. $jwt);
        
        // $this->authenticate($request, $guards);
    
        // return $response;

    }
}
