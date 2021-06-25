<?php
declare(strict_types=1);

class Teachercontroller
{
    public function render(array $GET, array $POST)
    {
        $loader = new TeacherLoader();
        $loader2 = new StudentLoader();

        if (isset($GET['id'])) {
            $data3 = $loader->getTeacherById((int)$GET['id']);
            $students =0;
            foreach (($loader2->getAllStudentsByTeacherId($data3->getId())) as $row){
                $students +=1;
            }


            require 'View/teacherOverview.php';

        } else {
            if (!empty($POST['update']) and !empty($POST['name']) and !empty($POST['email'])) {
                $loader->changeTeacherById($POST['name'], $POST['email'], $POST['update']);
                $POST['update'] = 0;
            } elseif (!empty($POST['delete'])) {
                $teacherMessage = $loader->deleteTeacherById($POST['delete']);
                $POST['delete'] = 0;
            } elseif (!empty($POST['add']) and !empty($POST['name']) and !empty($POST['email'])) {
                $loader->addTeacher($POST['name'], $POST['email']);
                $POST['add'] = 0;
            }


            $data = $loader->getTeachers();
            require 'View/teacherView.php';
        }
    }
}