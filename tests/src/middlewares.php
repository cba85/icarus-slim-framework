<?php

use Boronczyk\LocalizationMiddleware;

// Http authentification
$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" => "/basic-auth",
    "users" => [
        "root" => "t00r",
    ],
    'secure' => false,
]));

// Localization
$availableLocales = ['en_US', 'fr_CA', 'es_MX', 'eo'];
$defaultLocale = 'en_US';
$app->add(new LocalizationMiddleware($availableLocales, $defaultLocale));

// IP Address
$checkProxyHeaders = true;
$trustedProxies = ['10.0.0.1', '10.0.0.2'];
$app->add(new RKA\Middleware\IpAddress($checkProxyHeaders, $trustedProxies));

// CSRF
//$app->add(new \Slim\Csrf\Guard);