<?php

namespace Tests;

class BasicAuthTest extends BaseTestCase
{

    /**
     * Test basic authentification
     *
     * @return void
     */
    public function testBasicAuth()
    {
        $response = $this->runApp('GET', '/basic-auth');
        $this->assertEquals(401, $response->getStatusCode());
    }
}
