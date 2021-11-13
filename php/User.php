<?php

class User
{
    public $id;

    protected $firstName;
    protected $lastName;
    protected $age;

    private $self;

    public function __construct($firstName, $lastName, $age = 0)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function findAge($users, $age)
    {
        $result = [];

        foreach ($users as $user) {
            if ($user->age === $age) {
                $result[] = $user;
            }
        }

        return $result;
    }
}