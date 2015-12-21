<?php

namespace Crowi\Tests;

use Crowi\Crowi;

class PageTest extends \PHPUnit_Framework_TestCase
{
    private $crowi;

    public function setUp()
    {
        $this->crowi = new Crowi([
            'mongodb_url' => getenv('MONGO_URL'),
        ]);
    }

    public function testHoge()
    {
        $pages = $this->crowi->Page->findAll();
    }
}
