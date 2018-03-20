<?php
/**
 * Routes for test pages
 */

use Respect\Validation\Validator as v;

// Home
$app->get('/', function($request, $response) {
    return true;
})->setName('home');

// Basic authentification
$app->get('/basic-auth', function($request, $response) {
    return true;
})->setName('basic-auth');

// Localization
$app->get('/localization', function($request, $response) {
    $attrs = $request->getAttributes();
    $locale = $attrs['locale'];
    return $response->write($locale);
})->setName('localization');

// Client IP Address
$app->get('/ip-address', function($request, $response) {
    $ipAddress = $request->getAttribute('ip_address');
    return $response->write($ipAddress);;
})->setName('ip-address');

// Validation success
$app->get('/validation-success', function($request, $response) {
    $number = 123;
    $validated = v::numeric()->validate($number);
    return $response->write($validated);
})->setName('validation-success');

// Validation fail
$app->get('/validation-fail', function($request, $response) {
    $string = 'string';
    $validated = v::numeric()->validate($string);
    return $response->write((int)$validated);
})->setName('validation-fail');
