<?php


namespace App\Service\Petition;


interface ParserInterface
{
    public function parse(int $number, int $page): array;
}