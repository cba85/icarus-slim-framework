<?php

namespace Tests;

class HomepageTest extends BaseTestCase
{

    /**
     * Test the index route
     */
    public function testGetHomepageWithoutName()
    {
        $response = $this->runApp('GET', '/');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test that the index route won't accept a post request
     */
    public function testPostHomepageNotAllowed()
    {
        $response = $this->runApp('POST', '/', ['test']);

        $this->assertEquals(405, $response->getStatusCode());
        $this->assertContains('Method not allowed', (string)$response->getBody());
    }

    /*
    public function testLog() {
        $this->container->logger->debug($text);
    }
    */
}
