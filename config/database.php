<?php

return [

 // Default Database Connection Name
 'default' => env('DB_CONNECTION', 'mysql'),

 // Database Connections
 'connections' => [
  'mysql' => [
   'driver' => 'mysql',
   'host' => env('DB_HOST', '127.0.0.1'),
   'port' => env('DB_PORT', '3306'),
   'database' => env('DB_DATABASE', 'forge'),
   'username' => env('DB_USERNAME', 'forge'),
   'password' => env('DB_PASSWORD', ''),
   'unix_socket' => env('DB_SOCKET', ''),
   'charset' => 'utf8mb4',
   'collation' => 'utf8mb4_unicode_ci',
   'prefix' => '',
   'strict' => true,
   'engine' => null,
   'modes'  => [
    'ONLY_FULL_GROUP_BY',
    'STRICT_TRANS_TABLES',
    'NO_ZERO_IN_DATE',
    'NO_ZERO_DATE',
    'ERROR_FOR_DIVISION_BY_ZERO',
    'NO_ENGINE_SUBSTITUTION',
   ],
  ],
 ],
 
 // Migration Repository Table
 'migrations' => 'migrations',
 
 // Redis Databases
 'redis' => [
  'client' => 'predis',
  'default' => [
   'host' => env('REDIS_HOST', '127.0.0.1'),
   'password' => env('REDIS_PASSWORD', null),
   'port' => env('REDIS_PORT', 6379),
   'database' => 0,
  ],
 ],
];
