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
        $today = \Carbon\Carbon::today();

        $visitorExists = \App\Models\Visitor::where('ip_address', $request->ip())
            ->where('visited_date', $today)
            ->exists();

        if (!$visitorExists) {
            $visitor = \App\Models\Visitor::create([
                'ip_address' => $request->ip(),
                'visited_date' => $today,
            ]);

            Log::info('Data berhasil disimpan ke database.', [
                'visitor' => $visitor,
            ]);
        } else {
            Log::info('Pengunjung sudah tercatat hari ini.');
        }

        return $next($request);
    }
}
