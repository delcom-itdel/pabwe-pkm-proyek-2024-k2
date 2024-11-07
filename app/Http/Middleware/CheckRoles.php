<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoles
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {
        $auth = Auth::user();

        // Jika tidak ada user yang terautentikasi, arahkan ke halaman login
        if (!$auth) {
            return redirect()->route("login");
        }

        // Jika role pengguna tidak ada di dalam daftar role yang diizinkan, arahkan ke halaman home
        if (!in_array($auth->role, $roles)) {
            return redirect()->route("editor");
        }

        return $next($request);
    }
}
