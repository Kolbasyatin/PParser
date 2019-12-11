<?php


namespace App\Service\Petition;


class PetitionNameExtractor
{

    /** @var ParserInterface */
    private $parser;

    /** @var HolderInterface */
    private $holder;

    /**
     * PetitionNameExtractor constructor.
     * @param ParserInterface $parser
     * @param HolderInterface $holder
     */
    public function __construct(ParserInterface $parser, HolderInterface $holder)
    {
        $this->parser = $parser;
        $this->holder = $holder;
    }


    public function extractNames(int $petitionNumber, int $lastPage): void
    {
        $result = [];
        foreach (range(1, $lastPage) as $page) {
            $result[] = $this->parser->parse($petitionNumber, $page);
        }

        if (\count($result)) {
            $result = array_merge(...$result);
        }

        $this->holder->hold($petitionNumber, $result);
    }
}