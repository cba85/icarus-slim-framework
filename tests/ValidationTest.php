<?php

namespace Tests;

use Respect\Validation\Validator;

class ValidationTest extends BaseTestCase
{

    /**
     * Test validation success
     *
     * @return void
     */
    public function testValidationSuccess()
    {
        $response = $this->runApp('GET', '/validation-success');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('1', (string)$response->getBody());
    }

    /**
     * Test validation fail
     *
     * @return void
     */
    public function testValidationFail()
    {
        $response = $this->runApp('GET', '/validation-fail');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('0', (string)$response->getBody());
    }
}
