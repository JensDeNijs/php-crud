<?php


class TeacherLoader
{
    private array $teachers;

    public function __construct()
    {
        $this->loadTeachers();
    }

    public function getTeachers(): array
    {
        $this->loadTeachers();
        return $this->teachers;
    }

    public function loadTeachers()
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM teacher');
        $handle->execute();
        $selectedTeachers = $handle->fetchAll();
        $this->teachers = [];
        foreach ($selectedTeachers as $teacher) {
            $this->teachers[] = new Teacher((int)$teacher['Id'], $teacher['Name'], $teacher['Email']);
        }
    }

    public function getTeacherById(int $id)
    {
        foreach ($this->teachers as $teacher) {
            if ($teacher->getId() === $id) {
                return $teacher;
            }
        }
    }

    public function changeTeacherById($name, $email, $id)
    {
        $con = Database::openConnection();
        $handle = $con->prepare('UPDATE teacher set Name = :name, Email = :email WHERE id = :id');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':email', $email);
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function deleteTeacherById($id)
    {
        $con = Database::openConnection();
        $handle2 = $con->prepare('UPDATE class SET TeacherId = NULL WHERE TeacherId = :id2');
        $handle2->bindValue(':id2', $id);
        $handle2->execute();
        $handle = $con->prepare('DELETE FROM teacher WHERE Id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function addTeacher($name, $email)
    {
        $con = Database::openConnection();
        $handle = $con->prepare('INSERT INTO teacher (Name, Email) VALUES (:name, :email)');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':email', $email);
        $handle->execute();
    }

}