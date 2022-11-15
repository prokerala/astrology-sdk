<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class NameChart
{
    /**
     * @param CharacterValues[] $firstName
     * @param CharacterValues[] $lastName
     * @param CharacterValues[] $middleName
     */
    public function __construct(private $firstName, private $lastName, private $middleName)
    {
    }

    /**
     * @return CharacterValues[]
     */
    public function getFirstName(): array
    {
        return $this->firstName;
    }

    /**
     * @return CharacterValues[]
     */
    public function getLastName(): array
    {
        return $this->lastName;
    }

    /**
     * @return CharacterValues[]
     */
    public function getMiddleName(): array
    {
        return $this->middleName;
    }
}
