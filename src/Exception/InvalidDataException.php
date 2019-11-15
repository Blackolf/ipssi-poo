<?php

namespace Ipssi\Evaluation\Exception;

class InvalidDataException extends IpssiPooException
{
    private $invalidData;

    /** @var string */
    private $property;

    /** @var string */
    private $class;

    public function __construct($invalidData, string $property, string $class)
    {
        $this->invalidData = $invalidData;
        $this->property = $property;
        $this->class = $class;

        $this->message = "Invalid " . $this->property . " in " . $this->class . " '" . $this->invalidData . "' given.";
    }

    public function getInvalidData()
    {
        return $this->invalidData;
    }

    public function getProperty(): string
    {
        return $this->property;
    }

    public function getClass(): string
    {
        return $this->class;
    }
}
