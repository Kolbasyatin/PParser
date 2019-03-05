<?php


namespace App\Service\Petition;


interface HolderInterface
{
    public function hold(int $number, array $data): void;
}