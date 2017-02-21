<?php

namespace BIM\Http\Middleware;

use BIM\Enrollment;
use Closure;
use Illuminate\Support\Facades\Auth;

class CourseValidity
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
        $user = Auth::user();

        $check = Enrollment::where('student_id', '=', $user->id)->where('course_id', '=', $request->id)->where('status', '=', 1)->exists();

        if($check)
        {
            return $next($request);
        }
        else
        {
            return redirect('/my-courses');
        }
    }
}
