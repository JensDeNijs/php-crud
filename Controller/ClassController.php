<?php
declare(strict_types=1);

class ClassController
{
    public function render(array $GET, array $POST)
    {
        $loader = new SchoolClassLoader();
        $data = $loader->getClasses();

        require 'View/classView.php';
    }
}