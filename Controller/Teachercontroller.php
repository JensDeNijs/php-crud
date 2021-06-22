<?php
declare(strict_types=1);

class Teachercontroller
{
    public function render(array $GET, array $POST)
    {
        $loader = new TeacherLoader();
        $data = $loader->getTeachers();

        require 'View/teacherView.php';
    }
}