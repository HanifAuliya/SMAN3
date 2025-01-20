<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecordVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log untuk memastikan middleware dijalankan
        Log::info('RecordVisitor middleware dipanggil.', [
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $today = Carbon::today();

        // Cek apakah IP sudah tercatat hari ini
        $visitorExists = Visitor::where('ip_address', $request->ip())
            ->where('visited_date', $today)
            ->exists();

        if (!$visitorExists) {
            Visitor::create([
                'ip_address' => $request->ip(),
                'visited_date' => $today,
            ]);
        }

        return $next($request);
    }
}
