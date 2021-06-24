<?php
declare(strict_types=1);

class InfoController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $loader = new StudentLoader();
        $loader2 = new SchoolClassLoader();
        $loader3 = new TeacherLoader();
        session_start();

        if (isset($POST['student'])) {
            $_SESSION["table"] = $POST['student'];
        } elseif (isset($POST['class'])) {
            $_SESSION["table"] = $POST['class'];
        } elseif (isset($POST['teacher'])) {
            $_SESSION["table"] = $POST['teacher'];
        } elseif (isset($POST['rowClass'])) {
            $_SESSION["table"] = 'rowClass';
            $_SESSION["classId"] = $POST['rowClass'];
        }elseif (isset($POST['rowTeacher'])) {
            $_SESSION["table"] = 'rowTeacher';
            $_SESSION["teacherId"] = $POST['rowTeacher'];
        }elseif (isset($POST['getAllStudentsByClass'])) {
            $_SESSION["table"] = 'getAllStudentsByClass';
            $_SESSION["teacherId"] = $POST['getAllStudentsByClass'];
        }elseif (isset($POST['getAllStudentsByTeacher'])) {
            $_SESSION["table"] = 'getAllStudentsByTeacher';
            $_SESSION["teacherId"] = $POST['getAllStudentsByTeacher'];
        }



        $data = $loader->getStudents();
        $data2 = $loader2->getClasses();
        $data3 = $loader3->getTeachers();
        require 'View/info.php';

    }
}