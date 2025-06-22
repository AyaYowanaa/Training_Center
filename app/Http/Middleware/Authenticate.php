<?php

namespace App\Http\Middleware;

//use App\Http\Controllers\Api\ApiResponse;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Authenticate extends Middleware
{
//    use ApiResponse;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
   /* protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }*/


    protected function redirectTo(Request $request)
    {
               if (!$request->expectsJson()) {
            // الحصول على اللغة من الرابط
            $locale = LaravelLocalization::getCurrentLocale();

            // التحقق إذا كان الرابط يخص الأدمن
            if ($request->is(patterns: "$locale/admin/*")) {
                return route('admin.login');
            } elseif ($request->is("$locale/student/*")) {
                return route('student.login');
            }

            // الافتراضي للويب
            return route('admin.login');
//            return route('web.login');
        }
        return response(['message'=>'Token not found'], 401);

    }
}
