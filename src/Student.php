<?php

namespace School;

use DateTime;
use JetBrains\PhpStorm\Internal\TentativeType;
use JsonSerializable;

class Student implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $surname;
    private string $birthday;
    private string $characteristic;

    /**
     * @param int $id
     * @param string $name
     * @param string $surname
     * @param string $birthday
     * @param string $characteristic
     */
    public function __construct(int $id, string $name, string $surname, string $birthday, string $characteristic)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = $birthday;
        $this->characteristic = $characteristic;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     */
    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getCharacteristic(): string
    {
        return $this->characteristic;
    }

    /**
     * @param string $characteristic
     */
    public function setCharacteristic(string $characteristic): void
    {
        $this->characteristic = $characteristic;
    }


    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'birthday' => $this->getBirthday(),
            'characteristic' => $this->getCharacteristic()
        ];
    }
}