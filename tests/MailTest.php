<?php

namespace Tests;

use Icarus\Mail as Mail;

class Mailest extends BaseTestCase
{

    /**
     * Test mail
     *
     * @return void
     */
    public function testMail()
    {
        $mail = new Mail();
        $params = [
            'from' => 'john@appleseed.com',
            'to' => 'test@test.com',
            'subject' => 'Test',
            'text' => "If you received this email, it means emails work on your website!"
        ];
        //$mail->send($params);
    }
}