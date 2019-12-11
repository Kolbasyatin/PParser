<?php


namespace App\Service\Petition;


use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Request;

class PresidentParser extends Parser
{

    public function getUrl(int $petitionNumber, int $page): string
    {
        return sprintf('%s/%s/votes/%s', 'https://petition.president.gov.ua/petition', $petitionNumber, $page);
    }

    function doParse(string $uri): array
    {
        $crawler = $this->client->request(Request::METHOD_GET, $uri);

        $crawler->filter('.table_row')->each(
            static function ($node) use (&$data) {
                /** @var Crawler $node */
                $children = $node->children();
                $data[] = [
                    'time' => $children->filter('.date')->text(),
                    'name' => $children->filter('.name')->text()
                ];
            }
        );

        return $data;
    }


}