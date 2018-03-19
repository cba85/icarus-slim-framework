<?php

namespace Icarus;

use Mailgun\Mailgun;

/**
 * Mail
 */
class Mail
{

    /**
     * Mail
     *
     * @var object
     */
    private $mail;

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
     *
     * @param string $driver
     */
    public function __construct()
    {
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
        return $this->mg->messages()->send($this->domain, $params);
    }

}