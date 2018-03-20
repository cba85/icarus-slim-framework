<?php

namespace Tests;

class DatabaseTest extends BaseTestCase
{

    /**
     * Test database
     *
     * @return void
     */
    public function testDatabase()
    {
        $app = $this->getApp();
        $container = $app->getContainer();
        $posts = $container->db->fetchAll('SELECT * FROM posts');
    }
}
