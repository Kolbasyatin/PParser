<?php

namespace App\Tests\Service\Petition;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ParserTest extends WebTestCase
{

    public function testParse()
    {
        self::bootKernel();
        $service = self::$container->get('test.app.parser');
        $actual = $service->parse(5113, 195);
        $this->assertCount(40, $actual);
    }
}
