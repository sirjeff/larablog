<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;  
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider{
 /**
  * Bootstrap any application services.
  *
  * @return void
  */
 public function boot(){
   #if (config('app.env') === 'production') {
       URL::forceScheme('https');
   #}
 
 
   # Check if the application is running behind the proxy
   if (env("TRUST_PROXY", false)) {
       $trustedProxies = [# list of trusted IPs.
           "127.0.0.1",
           env('INTERNAL_PROXY_IP'),
       ];
       Request::setTrustedProxies($trustedProxies, Request::HEADER_X_FORWARDED_ALL);#Set the trusted proxies.
       # Or you can use Request::HEADER_X_FORWARDED_ALL to specify which headers to look for the client IP
   }
 

 }
 
 /**
  * Register any application services.
  *
  * @return void
  */
 public function register(){
    //
 }
}
