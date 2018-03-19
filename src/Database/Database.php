<?php
namespace Icarus;

use PDO;
use PDOException;

/**
 * Database PDO
 * This class is an abstract of PDO
 */
class Database
{

    /**
     * PDO object
     *
     * @var PDO
     */
    private $pdo;

    /**
     * Create a new Database instance
     *
     * @param array $database
     * @return void
     */
    public function __construct($database)
    {
        try {
            $this->pdo = new PDO(
                $database['driver'] . ':dbname=' . $database['database'] . ';host=' . $database['host'],
                $database['username'],
                $database['password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e) {
            echo 'Error: ' . $e->getMessage() . '<br />';
            echo 'Code: ' . $e->getCode();
        }
    }

    /**
     * Execute a query
     *
     * @param string $query
     * @param array $data
     * @return void
     */
    public function exec($query, $data = null)
    {
        $stmt = $this->pdo->prepare($query);
        try {
            $stmt->execute($data);
            return $stmt;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Insert query
     *
     * @param string $query
     * @param array $data
     * @return void
     */
    public function insert($query, $data = [])
    {
        return $this->exec($query, $data) ? ($this->pdo->lastInsertId() ? $this->pdo->lastInsertId() : true ) : false;
    }

    /**
     * Fetch object
     *
     * @param string $query
     * @param array $data
     * @return void
     */
    public function fetchObject($query, $data = [])
    {
        $result = $this->exec($query, $data);
        return $result->fetchObject();
    }

    /**
     * Fetch all
     *
     * @param string $query
     * @param array $data
     * @param const $type
     * @return void
     */
    public function fetchAll($query, $data = [], $type = PDO::FETCH_OBJ)
    {
        $results = $this->exec($query, $data);
        return $results->fetchAll($type);
    }

}
