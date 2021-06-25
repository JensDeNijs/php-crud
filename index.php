<?php
declare(strict_types=1);

//include all your model files here
require 'Model/Person.php';
require 'Model/Teacher.php';
require 'Model/Database.php';
require 'Model/SchoolClass.php';
require 'Model/SchoolClassLoader.php';
require 'Model/Student.php';
require 'Model/StudentLoader.php';
require 'Model/TeacherLoader.php';
require 'Model/User.php';

//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/InfoController.php';
require 'Controller/StudentController.php';
require 'Controller/Teachercontroller.php';
require 'Controller/ClassController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'info') {
    $controller = new InfoController();
}elseif(isset($_GET['page']) && $_GET['page'] === 'studentView') {
    $controller = new StudentController();
}elseif(isset($_GET['page']) && $_GET['page'] === 'classView') {
    $controller = new ClassController();
}elseif(isset($_GET['page']) && $_GET['page'] === 'teacherView') {
    $controller = new Teachercontroller();
}



$controller->render($_GET, $_POST);