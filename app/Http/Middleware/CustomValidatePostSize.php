<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\PostTooLargeException;

class CustomValidatePostSize {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Illuminate\Http\Exceptions\PostTooLargeException
     */
    public function handle($request, Closure $next){
        // You can set your custom limit here or bypass it
        $maxPostSize = $this->getPostMaxSize();

        if ($maxPostSize > 0 && $request->server('CONTENT_LENGTH') > $maxPostSize) {
            throw new PostTooLargeException();
        }

        return $next($request);
    }

    /**
     * Get the maximum allowed size for post data.
     *
     * @return int
     */
    protected function getPostMaxSize(){
        $postMaxSize = ini_get('post_max_size');

        return $this->convertToBytes($postMaxSize);
    }

    /**
     * Convert a PHP size value to bytes.
     *
     * @param  string  $value
     * @return int
     */
     protected function convertToBytes($value){
         $value = trim($value);
         $unit = strtolower($value[strlen($value) - 1]);
         $number = (int) $value;
     
         switch ($unit) {
             case 'g':
                 $number *= 1024 * 1024 * 1024;
                 break;
             case 'm':
                 $number *= 1024 * 1024;
                 break;
             case 'k':
                 $number *= 1024;
                 break;
         }
     
         return $number;
     }

}
