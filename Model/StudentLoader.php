<?php


class StudentLoader
{
    private array $students;


    public function __construct()
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM student');
        $handle->execute();
        $selectedStudents = $handle->fetchAll();

        foreach ($selectedStudents as $student) {
            $this->students[] = new Student((int)$student['Id'], $student['Name'], $student['Email'],(int)$student['ClassId']);
        }
    }

    public function getStudents(): array
    {
        return $this->students;
    }
    public function getStudentById(int $id)
    {
        foreach ($this->students as $student) {
            if ($student->getId() === $id) {
                return $student;
            }
        }
    }
    public function deleteStudentById($id){
        $con = Database::openConnection();
        $handle = $con->prepare('DELETE FROM student WHERE Id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }


}