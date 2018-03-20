<?php

namespace Tests;

class EnvTest extends BaseTestCase
{

    /**
     * Test dotenv
     *
     * @return void
     */
    public function testEnv()
    {
        $appName = env('APP_NAME');
    }
}
