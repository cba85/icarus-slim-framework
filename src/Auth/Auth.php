<?php
namespace Icarus;

use Icarus\Session;

/**
 * Authentification
 */
class Auth {

     /**
     * Database
     * @param object $db
     */
    private $db;

    /**
     * Session
     *
     * @var object $session
     */
    private $session;

    /**
     * Constructor
     *
     * @param object $db
     */
    public function __construct($db)
    {
        $this->db = $db;
        $this->session = new Session;
    }

    public function invoke() {
        return new Icarus\Auth;
    }

    /**
     * Check if user is authentified
     *
     * @return void
     */
    public function check()
    {
        return $this->session->exists('user');
        //return isset($_SESSION['user']);
    }

    /**
     * Get authentificated user
     *
     * @return object
     */
    public function user()
    {
        $query = 'SELECT * FROM users WHERE id = :id';
        $params = ['id' => $this->session->get('user')];
        //$params = ['id' => $_SESSION['user']];
        return $this->db->exec($query, $params);
    }

    /**
     * Attempt authentification
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    public function attempt($email, $password)
    {
        $query = 'SELECT * FROM users WHERE email = :email';
        $params = ['email' => $email];
        $user = $this->db->exec($query, $params);

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            $this->session->set('user', $user->id);
            //$_SESSION['user'] = $user->id;
            return true;
        }
        return false;
    }

    /**
     * Logout an user
     *
     * @return void
     */
    public function logout()
    {
        $this->session->clear('user');
        //unset($_SESSION['user']);
    }

}