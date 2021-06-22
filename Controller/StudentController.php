<?php
declare(strict_types=1);

class StudentController
{
    public function render(array $GET, array $POST)
    {
        $loader = new StudentLoader();
        $data = $loader->getStudents();

        if (isset($POST['delete'])){
            $loader->deleteStudentById($POST['delete']);

        }

        require 'View/studentView.php';
    }
}