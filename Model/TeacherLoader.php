<?php


class TeacherLoader
{
    private array $teachers;


    public function __construct()
    {
        $con = Database::openConnection();
        $handle = $con->prepare('SELECT * FROM teacher');
        $handle->execute();
        $selectedTeachers = $handle->fetchAll();

        foreach ($selectedTeachers as $teacher) {
            $this->teachers[] = new Teacher((int)$teacher['Id'], $teacher['Name'], $teacher['Email']);
        }
    }

    public function getTeachers(): array
    {
        return $this->teachers;
    }
    public function getTeacherById(int $id)
    {
        foreach ($this->teachers as $teacher) {
            if ($teacher->getId() === $id) {
                return $teacher;
            }
        }
    }

}