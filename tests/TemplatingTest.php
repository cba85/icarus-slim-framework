<?php

namespace Tests;

class TemplatingTest extends BaseTestCase
{

    /**
     * Test templating (Twig)
     *
     * @return void
     */
    public function testTemplating()
    {
        $app = $this->getApp();
        $container = $app->getContainer();
        $filename = 'test.html';
        $view = $container->view->fetch($filename, []);
    }
}
