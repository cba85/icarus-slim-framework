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
                $mail = function () {
                    return new MailgunHelper;
                };
                break;

            default:
                $mail = function () {
                    return new MailgunHelper;
                };
                break;
        }
        return $mail;
    }

    /**
     * Send email
     *
     * @param string $params
     * @return void
     */
    public function send($params) {
        return $this->mail->send($params);
    }

}