<?php
require 'vendor/autoload.php';

if(file_exists('./env.php')) {
    include './env.php';
}

if(!function_exists('env')) {
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        return $value;
    }
}

// ----------------------
//   FAT FREE FRAMEWORK
// ----------------------

$f3 = \Base::instance();
$f3->set('CACHE', true);
$f3->set('DEBUG', 3);
$f3->set('ANNO', date("Y"));
$f3->set('APP_VERSIONE', env("APP_VERSIONE"));

// ----------------------
//         ROUTE
// ----------------------

$f3->route('GET @home: /', '\App\Cover->Homepage');
$f3->route('POST @nuova: /', '\App\Cover->Nuova');

// Se errori
$f3->set('ONERROR',function($f3){
    $f3->reroute('/');
});

$f3->run();