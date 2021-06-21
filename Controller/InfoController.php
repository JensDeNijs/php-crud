<?php
declare(strict_types = 1);

class InfoController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $loader = new StudentLoader();
        $allClasses = $loader->getStudents();

        print_r($allClasses);
        echo "<br>";
        echo $allClasses[0]->getId();

        require 'View/info.php';
    }
}