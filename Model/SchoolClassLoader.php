<?php


class SchoolClassLoader
{
    private array $classes;

    public function __construct()
    {
        $this->loadClasses();
    }

    public function getClasses(): array
    {
        $this->loadClasses();
        return $this->classes;
    }

    public function loadClasses()
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM class');
        $handle->execute();
        $selectedSchools = $handle->fetchAll();
        $this->classes = [];
        foreach ($selectedSchools as $school) {
            $this->classes[] = new SchoolClass((int)$school['Id'], $school['Name'], $school['Location'], (int)$school['TeacherId']);
        }
    }

    public function getClassById(int $id)
    {
        foreach ($this->classes as $class) {
            if ($class->getId() === $id) {
                return $class;
            }
        }
    }

    public function addClass($name, $location, $teacherId)
    {
        $con = Database::openConnection();
        $handle = $con->prepare('INSERT INTO class (Name, Location, TeacherId) VALUES (:name, :location, :teacherId)');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':location', $location);
        $handle->bindValue(':teacherId', $teacherId);
        $handle->execute();
    }

    public function deleteClassById($id)
    {
        $con = Database::openConnection();
        $handle2 = $con->prepare('UPDATE student SET ClassId =NULL WHERE ClassId = :id2');
        $handle2->bindValue(':id2', $id);
        $handle2->execute();
        $handle = $con->prepare('DELETE FROM class WHERE Id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function changeClassById($name, $location, $teacherId, $id)
    {
        $con = Database::openConnection();
        $handle = $con->prepare('UPDATE class set Name = :name, Location = :location, TeacherId = :teacherId WHERE id = :id');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':location', $location);
        $handle->bindValue(':teacherId', $teacherId);
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

}