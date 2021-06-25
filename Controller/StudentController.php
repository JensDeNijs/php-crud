<?php
declare(strict_types=1);

class StudentController
{
    public function render(array $GET, array $POST)
    {
        $loader = new StudentLoader();
        $loader2 = new SchoolClassLoader();
        $loader3 = new TeacherLoader();
        //Vang hier ID op, als er 1 is, toon detail pagina. anders next if
       // var_dump($GET);

        if (isset($GET['id'])) {
            $data3 = $loader->getStudentById((int)$GET['id']);
            $teacherNew = $loader3->getTeacherByStudentId($data3->getId());
            require 'View/studentOverview.php';
        } elseif (isset($GET['teacherid'])) {
            $students= $loader->getAllStudentsByTeacherId($GET['teacherid']);
            require 'View/studentList.php';
        } elseif (isset($GET['classid'])) {
            $students=$loader->getAllStudentsByClassId($GET['classid']);
            require 'View/studentList.php';
        } else {
            if (!empty($POST['update']) and !empty($POST['name']) and !empty($POST['email'])) {
                $loader->changeStudentById($POST['name'], $POST['email'], $POST['classId'], $POST['update']);
                $POST['update'] = 0;
            } elseif (!empty($POST['delete'])) {
                $loader->deleteStudentById($POST['delete']);
                $POST['delete'] = 0;
            } elseif (!empty($POST['add']) and !empty($POST['name']) and !empty($POST['email'])) {
                $loader->addStudent($POST['name'], $POST['email'], $POST['classId']);
                $POST['add'] = 0;
            }
            $data = $loader->getStudents();
            $data2 = $loader2->getClasses();
            require 'View/studentView.php';
        }
    }
}