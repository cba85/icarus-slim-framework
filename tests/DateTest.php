<?php

namespace Tests;

use Carbon\Carbon;

class DateTest extends BaseTestCase
{

    /**
     * Test date
     *
     * @return void
     */
    public function testDate()
    {
        $now = Carbon::now();
    }
}
