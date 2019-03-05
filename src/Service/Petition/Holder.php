<?php


namespace App\Service\Petition;


use Symfony\Component\Filesystem\Filesystem;

class Holder implements HolderInterface
{
    public function hold(int $number, array $data): void
    {
        $fileSystem = new Filesystem();
        foreach ($data as $name) {
            $string = implode('  :  ', array_values($name));
            $fileSystem->appendToFile('names.txt', $string."\n");

        }
    }

}
