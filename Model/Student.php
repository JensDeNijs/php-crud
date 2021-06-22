<?php

class Student extends Person
{
    private int $classId;

    public function __construct(int $id, string $name, string $email,int $classId)
    {
        $this->classId = $classId;
        parent::__construct($id, $name, $email);
    }

    public function getClassId(): int
    {
        return $this->classId;
    }
}