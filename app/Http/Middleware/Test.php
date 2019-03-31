<?php
namespace App\Http\Middleware;

use Closure;
class Test
{
    public function handle($request,Closure $next){
        if(time() < strtotime('2019-04-01')){
            return redirect('test/activity0');
        }
        return $next($request);
    }
}