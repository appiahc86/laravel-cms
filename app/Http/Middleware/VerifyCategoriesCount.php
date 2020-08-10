<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;
use Illuminate\Support\Facades\Session;

class VerifyCategoriesCount
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
        if (Category::all()->count() == 0){

            Session::flash('deleted', 'You need to add a category to be able to create a post');
            return redirect(route('categories.create'));
        }



        return $next($request);
    }
}
