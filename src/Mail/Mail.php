<?php

namespace Icarus;

use Psr\Container\ContainerInterface;
use Icarus\MailgunHelper as MailgunHelper;

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
     * Constructor
     *
     * @param string $driver
     */
    public function __construct($driver) {
        $mail = $this->initMailDriver($driver);
    }

    /**
     * Init mail driver
     *
     * @param string $driver
     * @return void
     */
    public function initMailDriver($driver) {
        switch($driver) {
            case 'mailgun':
                $mail = new MailgunHelper;
                break;

            default:
                $mail = new MailgunHelper;
                break;
        }
        return $mail;
    }

    /**
     * Send email
     *
     * @param string $from
     * @param string $to
     * @param string $cc
     * @param string $subject
     * @param string $text
     * @return void
     */
    public function sendMail($from, $to, $cc, $subject, $text) {
        $this->mail->sendmail($from, $to, $cc, $subject, $text);
    }

}