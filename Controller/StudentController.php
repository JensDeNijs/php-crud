<?php
declare(strict_types=1);

class StudentController
{
    public function render(array $GET, array $POST)
    {
        $loader = new StudentLoader();
        $loader2 = new SchoolClassLoader();

        if (isset($POST['update'])) {
            $loader->changeStudentById($POST['name'], $POST['email'], $POST['classId'], $POST['update']);
            $POST['update'] = 0;
        } elseif (isset($POST['delete'])) {
            $loader->deleteStudentById($POST['delete']);
            $POST['delete'] = 0;
        } elseif (isset($POST['add']) and isset($POST['name']) and isset($POST['email'])) {
            $loader->addStudent($POST['name'], $POST['email'], $POST['classId']);
            $POST['add'] = 0;
        }

        $data = $loader->getStudents();
        $data2 = $loader2->getClasses();
        require 'View/studentView.php';
    }
}