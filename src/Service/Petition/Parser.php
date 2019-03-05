<?php


namespace App\Service\Petition;


use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class Parser
{
    /** @var string  */
    private const PETITION_PAGE = 'https://itd.rada.gov.ua/services/Petition/Index' ;
    /** @var Client */
    private $client;

    /**
     * Parser constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function parse(int $number, int $page): array
    {
        $data = [];
        $url = sprintf('%s/%s?page=%s', self::PETITION_PAGE, $number, $page);

        $crawler = $this->client->request('GET', $url);
        $crawler->filter('.perelik-body .view-top .view-top-left')->each(function ($node) use (&$data) {
            /** @var Crawler $node */
            $node->filter('div')->each(
                function ($node) use (&$data){
                    /** @var Crawler $node */
                    $data[] = [
                        'time' => $node->filter('span.time')->text(),
                        'name' => $node->filter('span.name')->text(),
                    ];
                }
            );

        });

        return $data;
    }
}