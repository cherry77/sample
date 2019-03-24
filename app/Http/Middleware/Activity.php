<?php
namespace App\Http\Middleware;

use Closure;
class Activity
{
    //怎样区分是前置还是后置操作：是根据中间件的逻辑是在请求前还是请求后来区分的
    //前置
//    public function handle($request,Closure $next){
//        if(time() < strtotime('2019-03-31')){
//            return redirect('activity0');
//        }
//        return $next($request);
//    }
    //后置
    public function handle($request,Closure $next){
        $response = $next($request);
        dd($response);
        //逻辑
        echo '我是后置操作';
    }
}