<?php
declare(strict_types=1);

class StudentController
{
    public function render(array $GET, array $POST)
    {
        $loader = new StudentLoader();
        $data = $loader->getStudents();

        require 'View/studentView.php';
    }
}