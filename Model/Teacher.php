<?php


class Teacher extends Person
{

    public function __construct(int $id, string $name, string $email)
    {
        parent::__construct($id, $name, $email);
    }

}