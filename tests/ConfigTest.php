<?php

namespace Tests;

class ConfigTest extends BaseTestCase
{

    /**
     * Test config
     *
     * @return void
     */
    public function testConfig()
    {
        $app = $this->getApp();
        $container = $app->getContainer();
        $config = $container->config->all();
        //print_r($config);
    }
}
