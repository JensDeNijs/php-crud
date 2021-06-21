<?php


class SchoolClassLoader
{
    private array $classes;


    public function __construct()
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM class');
        $handle->execute();
        $selectedSchools = $handle->fetchAll();

        foreach ($selectedSchools as $school) {
            $this->classes[] = new SchoolClass((int)$school['Id'], $school['Name'], $school['Location'],(int)$school['TeacherId']);
        }
    }

    public function getClasses(): array
    {
        return $this->classes;
    }
    public function getClassById(int $id)
    {
        foreach ($this->classes as $class) {
            if ($class->getId() === $id) {
                return $class;
            }
        }
    }

}