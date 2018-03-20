<?php
/**
 * Routes for test pages
 */

// Home
$app->get('/', 'Tests\Controller:home')->setName('home');