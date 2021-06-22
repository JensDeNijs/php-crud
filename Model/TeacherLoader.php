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

}