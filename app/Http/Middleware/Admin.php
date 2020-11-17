<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     * คอยเช็ค URL ว่าเป็น URL อะไร และใส่เงื่อนไขต่างๆ
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // ตรวจว่ามีการ login หรือไม่
        if (empty(auth()->user()->isAdmin)) {
            //ถ้าไม่ได้เป็น Admin
            // Auth()->logout();
            return redirect('login');
        } else{
            if (auth()->user()->isAdmin == 1) {
                return $next($request);
            }
        }

        return redirect('backend/nopermission')->with('error', 'You have now admin access');

    }
}
