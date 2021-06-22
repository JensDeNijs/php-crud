<?php
declare(strict_types=1);

class StudentController
{
    public function render(array $GET, array $POST)
    {
        $loader = new StudentLoader();
        $data = $loader->getStudents();

        print_r($POST);

        if (isset($POST['update'])){
            $loader->changeStudentById($POST['name'],$POST['email'],$POST['classId'],$POST['update']);

            //header("Refresh:0");
        }elseif (isset($POST['delete'])){
            $loader->deleteStudentById($POST['delete']);
            $POST['delete']=0;
            header("Refresh:0");
        }

        if (isset($POST['name']) and isset($POST['email']) and ((isset($POST['classId'])and is_numeric($POST['classId'])))){
            $loader->addStudent($POST['name'],$POST['email'],$POST['classId']);
            //header("Refresh:0");
            }

        require 'View/studentView.php';
    }
}