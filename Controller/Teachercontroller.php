<?php
declare(strict_types=1);

class Teachercontroller
{
    public function render(array $GET, array $POST)
    {
        $loader = new TeacherLoader();

        if (isset($POST['update'])) {
            $loader->changeTeacherById($POST['name'], $POST['email'], $POST['update']);
            $POST['update'] = 0;
        } elseif (isset($POST['delete'])) {
            $teacherMessage = $loader->deleteTeacherById($POST['delete']);
            $POST['delete'] = 0;
        } elseif (isset($POST['add']) and isset($POST['name']) and isset($POST['email'])) {
            $loader->addTeacher($POST['name'], $POST['email']);
            $POST['add'] = 0;
        }


        $data = $loader->getTeachers();
        require 'View/teacherView.php';
    }
}