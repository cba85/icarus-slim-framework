<?php

namespace Tests;

class LocalizationTest extends BaseTestCase
{

    /**
     * Test log
     *
     * @return void
     */
    public function testLocalization()
    {
        $response = $this->runApp('GET', '/localization');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('en_US', (string)$response->getBody());
    }
}
