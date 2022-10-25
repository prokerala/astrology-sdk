<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class NameResult
{
    /**
     * @var CharacterValues[]
     */
    private $firstName;
    /**
     * @var CharacterValues[]
     */
     private $lastName;
    /**
     * @var CharacterValues[]
     */
    private $middleName;


    /**
     * @param CharacterValues[] $firstName
     * @param CharacterValues[] $lastName
     * @param CharacterValues[] $middleName
     */
    public function __construct ($firstName, $lastName, $middleName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->middleName = $middleName;
    }

    /**
     * @return array
     */
    public function getFirstName(): array
    {
        return $this->firstName;
    }

    /**
     * @return array
     */
    public function getLastName(): array
    {
        return $this->lastName;
    }

    /**
     * @return array
     */
    public function getMiddleName(): array
    {
        return $this->middleName;
    }
}
