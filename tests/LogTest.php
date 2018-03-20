<?php

namespace Tests;

class LogTest extends BaseTestCase
{

    /**
     * Test log
     *
     * @return void
     */
    public function testLog()
    {
        $app = $this->getApp();
        $container = $app->getContainer();
        $container->logger->debug('home');
    }
}
