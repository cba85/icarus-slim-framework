<?php

namespace Tests;

use Icarus\Session;

class SessionTest extends BaseTestCase
{

    /**
     * Test session
     *
     * @return void
     */
    public function testSession()
    {
        $session = new Session;
        $session->set('test', 'test');
    }
}
