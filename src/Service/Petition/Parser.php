<?php


namespace App\Service\Petition;


use Goutte\Client;

/**
 * Class Parser
 * @package App\Service\Petition
 */
abstract class Parser implements ParserInterface

{
    /** @var Client */
    protected $client;

    /**
     * Parser constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    abstract function getUrl(int $petitionNumber, int $page): string;

    abstract function doParse(string $uri):array ;

    public function parse(int $number, int $page): array
    {
        $url = $this->getUrl($number, $page);

        return $this->doParse($url);
    }
}