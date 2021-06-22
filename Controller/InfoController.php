<?php
declare(strict_types=1);

class InfoController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        /*$loader = new StudentLoader();
        $allClasses = $loader->getStudents();

        print_r($allClasses);
        echo "<br>";
        echo $allClasses[0]->getId();
        echo "<br>";
        var_dump($POST);
        echo "<br>";
        echo $POST['btn'];
        echo "<br>";*/

        if (isset($POST["btn"])) {
            if($POST["btn"]==="student"){
                $loader = new StudentLoader();
                $data = $loader->getStudents();
            }elseif($POST["btn"]==="class"){
                $loader2 = new SchoolClassLoader();
                $data = $loader2->getClasses();
            }elseif($POST["btn"]==="teacher"){
                $loader = new TeacherLoader();
                $data = $loader->getTeachers();
            }
        }

        require 'View/info.php';

    }
}