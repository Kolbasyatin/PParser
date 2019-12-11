<?php


namespace App\Service\Petition;


use Symfony\Component\DomCrawler\Crawler;

class RadaParser extends Parser
{
    public function getUrl(int $petitionNumber, int $page): string
    {
        return sprintf('%s/%s?page=%s', 'https://itd.rada.gov.ua/services/Petition/Index', $petitionNumber, $page);
    }

    function doParse(string $uri): array
    {
        $crawler = $this->client->request('GET', $uri);
        $crawler->filter('.perelik-body .view-top .view-top-left')->each(
            static function ($node) use (&$data) {
                /** @var Crawler $node */
                $node->filter('div')->each(
                    static function ($node) use (&$data) {
                        /** @var Crawler $node */
                        $data[] = [
                            'time' => $node->filter('span.time')->text(),
                            'name' => $node->filter('span.name')->text(),
                        ];
                    }
                );
            }
        );

        return $data;
    }


}