<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Adrianorosa\GeoLocation\GeoLocation;

class GeoIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = \Request::ip();
        // $ip = '194.177.32.0';
        $details = GeoLocation::lookup($ip);

        // echo $details->getIp();
        // // 8.8.8.8

        // echo $details->getCity();
        // // Mountain View

        // echo $details->getRegion();
        // // California

        // echo $details->getCountry();
        // // United States
        $currency = 'dollar';
        $currencySign = '$ ';
        if ($details->getCountry() === 'France' || $details->getCountry() === 'Germany' || $details->getCountry() === 'United Kingdom' || $details->getCountry() === 'Italy' || $details->getCountry() === 'Spain' || $details->getCountry() === 'Ukraine' || $details->getCountry() === 'Poland' || $details->getCountry() === 'Romania' || $details->getCountry() === 'Belgium' || $details->getCountry() === 'Greece' || $details->getCountry() === 'Portugal' || $details->getCountry() === 'Sweden' || $details->getCountry() === 'Hungary' || $details->getCountry() === 'Austria' || $details->getCountry() === 'Switzerland' || $details->getCountry() === 'Denmark' || $details->getCountry() === 'Slovakia' || $details->getCountry() === 'Monaco' || $details->getCountry() === 'Luxembourg' || $details->getCountry() === 'Slovenia' || $details->getCountry() === 'Croatia' || $details->getCountry() === 'Ireland') {
            $currency = 'euro';
            $currencySign = '€ ';
        }
        if ($details->getCountry() === 'Morocco') {
            $currency = 'mad';
            $currencySign = 'MAD ';
        }

        $request->merge(['currency' => $currency, 'currencySign' => $currencySign]);
        return $next($request);
    }
}
