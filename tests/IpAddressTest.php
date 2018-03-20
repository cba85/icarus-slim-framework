<?php

namespace Tests;

class IpAddressTest extends BaseTestCase
{

    /**
     * Test log
     *
     * @return void
     */
    public function testIpAddress()
    {
        $response = $this->runApp('GET', '/ip-address');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('127.0.0.1', (string)$response->getBody());
    }
}
