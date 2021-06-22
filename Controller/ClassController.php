<?php
declare(strict_types=1);

class ClassController
{
    public function render(array $GET, array $POST)
    {
        $loader = new SchoolClassLoader();
        $loader2 = new TeacherLoader();

        print_r($POST);
        if (isset($POST['update'])) {
            $loader->changeClassById($POST['name'], $POST['location'], $POST['teacherId'], $POST['update']);
            $POST['update'] = 0;
        }elseif (isset($POST['delete'])) {
            $loader->deleteClassById($POST['delete']);
            $POST['delete'] = 0;
        } elseif (isset($POST['add']) and isset($POST['name']) and isset($POST['location'])) {
            $loader->addClass($POST['name'], $POST['location'], $POST['teacherId']);
            $POST['add'] = 0;
        }

        $data = $loader->getClasses();
        $data2 = $loader2->getTeachers();
        require 'View/classView.php';
    }
}