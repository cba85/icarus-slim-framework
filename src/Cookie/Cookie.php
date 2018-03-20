<?php

namespace Icarus;

class Cookie
{

    /**
     * Path
     *
     * @var string
     */
    protected $path = '/';

    /**
     * Domain
     *
     * @var string
     */
    protected $domain = null;

    /**
     * Secure
     *
     * @var boolean
     */
    protected $secure = false;

    /**
     * Http only
     *
     * @var boolean
     */
    protected $httpOnly = true;

    /**
     * Set a cookie
     *
     * @param string $name
     * @param string $value
     * @param integer $minutes
     * @return void
     */
    public function set($name, $value, $minutes = 60)
    {
        $expiry = time() + ($minutes * 60);
        setcookie($name, $value, $expiry,
        $this->path, $this->domain, $this->secure, $this->httpOnly);
    }

    /**
     * Get a cookie
     *
     * @param int $key
     * @param int $default
     * @return void
     */
    public function get($key, $default = null) {
        if ($this->exists($key)) {
            return $_COOKIE[$key];
        }
        return $default;
    }

    /**
     * Is a cookie exists?
     *
     * @param [type] $key
     * @return void
     */
    public function exists($key) {
        return isset($_COOKIE[$key]) && !empty($_COOKIE[$key]);
    }

    /**
     * Clear a cookie
     *
     * @param int $key
     * @return void
     */
    public function clear($key) {
        $this->set($key, null, -2628000, $this->path, $this->domain);
    }

    /**
     * Set a cookie forever
     *
     * @param int $key
     * @param string $value
     * @return void
     */
    public function forever($key, $value) {
        $this->set($key, null, 2628000);
    }

}