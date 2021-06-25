<?php
declare(strict_types=1);

class ClassController
{
    public function render(array $GET, array $POST)
    {
        $loader = new SchoolClassLoader();
        $loader2 = new TeacherLoader();
        $loader3 = new StudentLoader();

        if (isset($GET['id'])) {
            $data3 = $loader->getClassById((int)$GET['id']);
            $data = $loader3->getStudents();
            $teacher = ($loader2->getTeacherById($data3->getTeacherId()))->getName();
            $students=0;
            foreach ($data as $row){
                if(($row->getClassId())=== $data3->getId()) {
                    $students += 1;
                }
            }

            require 'View/classOverview.php';
        } else {
            if (!empty($POST['update']) and !empty($POST['name']) and !empty($POST['location'])) {
                $loader->changeClassById($POST['name'], $POST['location'], $POST['teacherId'], $POST['update']);
                $POST['update'] = 0;
            } elseif (!empty($POST['delete'])) {
                $loader->deleteClassById($POST['delete']);
                $POST['delete'] = 0;
            } elseif (!empty($POST['add']) and !empty($POST['name']) and !empty($POST['location'])) {
                $loader->addClass($POST['name'], $POST['location'], $POST['teacherId']);
                $POST['add'] = 0;
            }
            $data = $loader->getClasses();
            $data2 = $loader2->getTeachers();
            require 'View/classView.php';
        }
    }
}