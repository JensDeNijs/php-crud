<?php


class StudentLoader
{
    private array $students;
    private array $studentsByClass;
    public function __construct()
    {
        $this->loadStudents();
    }

    public function getStudents(): array
    {
        $this->loadStudents();
        return $this->students;
    }

    public function loadStudents()
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM student');
        $handle->execute();
        $selectedStudents = $handle->fetchAll();
        $this->students = [];
        foreach ($selectedStudents as $student) {
            $this->students[] = new Student((int)$student['Id'], $student['Name'], $student['Email'], (int)$student['ClassId']);
        }
    }

    public function getStudentById(int $id)
    {
        foreach ($this->students as $student) {
            if ($student->getId() === $id) {
                return $student;
            }
        }
    }

    public function deleteStudentById($id)
    {
        $con = Database::openConnection();
        $handle = $con->prepare('DELETE FROM student WHERE Id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function addStudent($name, $email, $classId)
    {
        $con = Database::openConnection();
        $handle = $con->prepare('INSERT INTO student (Name, Email, ClassId) VALUES (:name, :email, :classId)');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':email', $email);
        $handle->bindValue(':classId', $classId);
        $handle->execute();
    }

    public function changeStudentById($name, $email, $classId, $id)
    {
        $con = Database::openConnection();
        $handle = $con->prepare('UPDATE student set Name = :name, Email = :email, ClassId = :classId WHERE id = :id');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':email', $email);
        $handle->bindValue(':classId', $classId);
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function getAllStudentsByTeacherId($id){
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT student.* FROM student INNER JOIN class ON student.ClassId = class.Id INNER JOIN teacher ON class.TeacherId = teacher.Id WHERE teacher.Id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
        return $handle->fetchAll();

    }
}