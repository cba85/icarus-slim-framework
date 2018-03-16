<?php

namespace Icarus;

use Psr\Container\ContainerInterface;
use Mailgun\Mailgun;

/**
 * Mailgun
 */
class MailgunHelper extends Mail
{

    /**
     * Mailgun
     *
     * @var object
     */
    private $mg;

    /**
     * Private API key
     *
     * @var string
     */
    private $key;

    /**
     * Domain
     *
     * @var string
     */
    private $domain;

    /**
     * Constructor
     */
    public function __construct() {
        $this->key = env('MAILGUN_PRIVATE_KEY');
        $this->domain = env('MAILGUN_DOMAIN');
        $this->mg = Mailgun::create($this->key);
    }

    /**
     * Send an email using Mailgun
     *
     * @param string $from
     * @param string $to
     * @param string $cc
     * @param string $subject
     * @param string $text
     * @return void
     */
    public function sendMail($from, $to, $cc, $subject, $text)
    {
        return $this->mg->messages()->send($this->domain, [
            'from'    => $from,
            'to'      => $to,
            'cc'      => $cc,
            'subject' => $subject,
            'text'    => $text
            ]);
    }
}