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
        $this->key = getenv('MAILGUN_PRIVATE_KEY');
        $this->domain = getenv('MAILGUN_DOMAIN');
        $this->mg = Mailgun::create($this->key);
    }

    /**
     * Send an email using Mailgun
     *
     * @param array $from
     * @return void
     */
    public function send($params)
    {
        return $this->mg->messages()->send($this->domain, [
            'from'    => $params['from'],
            'to'      => $params['to'],
            'cc'      => $params['cc'],
            'subject' => $params['subject'],
            'text'    => $params['text']
            ]);
    }
}