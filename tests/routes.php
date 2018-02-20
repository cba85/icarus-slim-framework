<?php
/**
 * Routes for test pages
 */

// Home
$app->get('/', 'Tests\ExampleController:home')->setName('home');
