<?php

namespace Dykyi\ValueObjects;

/**
 * Class ArgvInput
 * @package Dykyi\ValueObjects
 */
class CommandInput
{
    /** @var string */
    private $command = '';

    /** @var array */
    private $options = [];

    /**
     * ArgvInput constructor.
     * @param array|null $argv
     */
    public function __construct(array $argv = null)
    {
        if ($argv === null) {
            $argv = $_SERVER['argv'];
        }
        $this->parseArgument($argv);
    }

    /**
     * Parsing argv
     *
     * @param array $argv
     */
    private function parseArgument(array $argv) //: void
    {
        $tempArray = $argv;
        array_shift($tempArray);
        if (count($tempArray) > 0) {
            $this->command = $tempArray[0];
            array_shift($tempArray);
        }

        $this->options = $tempArray;
    }

    public function isCommandEmpty(): bool
    {
        return $this->getCommand() === '';
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

}