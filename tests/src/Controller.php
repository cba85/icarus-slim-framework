<?php

namespace Tests;

use Slim\Http\Request;

/**
 * Controller for web pages
 */
class Controller
{
    /**
     * Homepage
     * @param  Request $request
     * @param  Response $response
     */
    public function home($request, $response)
    {
        // Test example controller
        return true;
        // Test database
        //$posts = $this->db->fetchAll('SELECT * FROM posts');
        // Test view
        //return $this->view($response, 'index.html');
    }

}
