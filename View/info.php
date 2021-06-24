<?php require 'includes/header.php' ?>
    <section>
        <h4>Info page</h4>

        <p><a href="index.php">Back to homepage</a></p>
        <p><a href="index.php?page=studentView">Student Table</a></p>
        <p><a href="index.php?page=classView">Class Table</a></p>
        <p><a href="index.php?page=teacherView">Teacher Table</a></p>
        <p><a href="index.php?page=info">Info Table</a></p>

        <form action="" method="POST">
            <button name="student" value="student">Student</button>
            <button name="class" value="class">Class</button>
            <button name="teacher" value="teacher">Teacher</button>
            <table>
                <?php

                if (isset($_SESSION['table'])) {
                    switch ($_SESSION['table']) {

                        case 'student':
                            echo '
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Class</th>
                                <th>Teacher</th>
                            </tr>';
                            foreach ($data as $row) {
                                echo '
                            <tr>
                                <td>' . $row->getId() . '</td>
                                <td>' . $row->getName() . '</td>
                                <td>' . $row->getEmail() . '</td>
                                ';
                                if ($loader2->getClassById($row->getClassId()) === null) {
                                    echo '<td>No Class</td>';
                                } else {
                                    echo '<td><button name="rowClass" value="' . $row->getClassId() . '">' . ($loader2->getClassById($row->getClassId()))->getName() . '</button></td>';
                                }
                                if ($loader2->getClassById($row->getClassId()) === null) {
                                    echo '<td>No Teacher</td></tr>';
                                } else {
                                    $teacherNew = $loader3->getTeacherByStudentId($row->getId());
                                    echo '<td><button name="rowTeacher" value="' . $teacherNew[0]['Id'] . '">' . $teacherNew[0]['Name'] . '</button></td></tr>';
                                }

                                echo '
                                <td></td>
                            </tr>';
                            }
                            break;

                        case 'class':

                            echo '<tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Teacher</th>
                                <th>Students</th>
                            </tr>';
                            foreach ($data2 as $row) {
                                $studentNr=0;
                                foreach ($data as $row2){
                                    if(($row2->getClassId())=== $row->getId()) {
                                        $studentNr += 1;
                                    }
                                }
                                echo '
                            <tr>
                                <td>' . $row->getId() . '</td>
                                <td>' . $row->getName() . '</td>
                                <td>' . $row->getLocation() . '</td>
                                <td><button name="rowTeacher" value="'.($loader3->getTeacherById($row->getTeacherId()))->getId().'">' . ($loader3->getTeacherById($row->getTeacherId()))->getName() . '</button></td>
                                <td><button name="getAllStudentsByClass" value="'.$row->getId().'">Get all '.$studentNr.' students</button></td>
                            </tr>';
                            }
                            break;

                        case 'teacher':

                            echo '
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Students</th>
                            </tr>';

                            foreach ($data3 as $row) {
                                $students =0;
                                foreach (($loader->getAllStudentsByTeacherId($row->getId())) as $row2){
                                    $students +=1;
                                }
                                echo '
                            <tr>
                                <td>' . $row->getId() . '</td>
                                <td>' . $row->getName() . '</td>
                                <td>' . $row->getEmail() . '</td>
                                <td><button name="getAllStudentsByTeacher" value="'.$row->getId().'">Get all '.$students.' students</button></td>
                            </tr>';
                            }


                            break;


                        case 'rowClass':
                            $studentNr=0;
                            foreach ($data as $row){
                                if(($row->getClassId())=== $loader2->getClassById($POST['rowClass'])->getId() ) {
                                    $studentNr += 1;
                                }
                            }
                            echo '<tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Teacher</th>
                                <th>Students</th>
                            </tr>
                            <tr>
                                <td>'.($loader2->getClassById($POST['rowClass']))->getId().'</td>
                                <td>'.($loader2->getClassById($POST['rowClass']))->getName().'</td>
                                <td>'.($loader2->getClassById($POST['rowClass']))->getLocation().'</td>
                                <td>'.($loader3->getTeacherById($loader2->getClassById($POST['rowClass'])->getTeacherId()))->getName().'</td>
                                <td>'. $studentNr .'</td>
                            </tr>
                            ';


                            break;

                        case 'rowTeacher':
                            echo '
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <td>'.($loader3->getTeacherById($POST['rowTeacher']))->getId().'</td>
                                <td>'.($loader3->getTeacherById($POST['rowTeacher']))->getName().'</td>
                                <td>'.($loader3->getTeacherById($POST['rowTeacher']))->getEmail().'</td>
                            </tr>
                            ';


                            break;

                        case 'getAllStudentsByClass':
                            echo ' 
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Class</th>
                            </tr>';
                            foreach ($data as $row2){
                                if(($row2->getClassId())=== ($loader2->getClassById($POST['getAllStudentsByClass']))->getId()) {
                                    echo ' 
                            <tr>
                                <td>'.$row2->getId().'</td>
                                <td>'.$row2->getName().'</td>
                                <td>'.$row2->getEmail().'</td>
                                <td>'.($loader2->getClassById($POST['getAllStudentsByClass']))->getName().'</td>
                            </tr>';
                                }
                            }
                            break;

                        case 'getAllStudentsByTeacher':
                            echo ' 
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Class</th>
                            </tr>';
                            foreach (($loader->getAllStudentsByTeacherId($POST['getAllStudentsByTeacher'])) as $row){
                                echo ' 
                            <tr>
                                <td>'.$row['Id'].'</td>
                                <td>'.$row['Name'].'</td>
                                <td>'.$row['Email'].'</td>
                                <td>'.($loader2->getClassById($row['ClassId']))->getName().'</td>
                            </tr>';
                                     }
                            break;
                    }
                }
                ?>
            </table>
        </form>
    </section>
<?php require 'includes/footer.php' ?>