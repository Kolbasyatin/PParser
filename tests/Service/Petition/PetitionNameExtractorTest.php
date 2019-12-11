<?php

namespace App\Tests\Service\Petition;

use App\Service\Petition\PetitionNameExtractor;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PetitionNameExtractorTest extends WebTestCase
{

    public function testRadaExtractNames()
    {
        self::bootKernel();
        $service = self::$container->get('test.app.rada.extractor');
        $service->extractNames(79326, 257);
    }

    public function testPresidentExtractNames()
    {
        self::bootKernel();
        $service = self::$container->get('test.app.president.extractor');
        $service->extractNames(79326, 259);
    }
}
