<?php
namespace Icarus;

/**
 * Authentification
 */
class Auth {

     /**
     * Database
     * @param $object $db
     */
    private $db;

    /**
     * Constructor
     *
     * @param object $db
     */
    public function __construct($db)
    {
        $this->db = $db;
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
        return isset($_SESSION['user']);
    }

    /**
     * Get authentificated user
     *
     * @return object
     */
    public function user()
    {
        $query = 'SELECT * FROM users WHERE id = :id';
        $params = ['id' => $_SESSION['user']];
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
            $_SESSION['user'] = $user->id;
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
        unset($_SESSION['user']);
    }

}