<?php

namespace Tests;

use samdark\sitemap\Sitemap;
use samdark\sitemap\Index;

class SitemapTest extends BaseTestCase
{

    /**
     * Test sitemap
     *
     * @return void
     */
    public function testSitemap()
    {
        $sitemap = new Sitemap(__DIR__ . '/tmp/sitemap.xml');
        $sitemap->addItem(getenv("APP_URL"));
        $sitemap->write();
        return true;
    }
}
