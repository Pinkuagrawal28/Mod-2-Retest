<?php

use App\Service\EnvHandler;

$env = new EnvHandler();

return [
    'host' => $env->get("redishost"),
    'port' => $env->get("redisport"),
    'timeout' => $env->get("redistimeout"),
    'scheme' => $env->get("redisscheme"),
];
