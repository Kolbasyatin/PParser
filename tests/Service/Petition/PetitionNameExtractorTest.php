<?php

namespace App\Tests\Service\Petition;

use App\Service\Petition\PetitionNameExtractor;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PetitionNameExtractorTest extends WebTestCase
{

    public function testExtractNames()
    {
        self::bootKernel();
        $service = self::$container->get('test.app.extractor');
        $service->extractNames(5113, 199);
    }
}
