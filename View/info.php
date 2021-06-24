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
                print_r($POST);
                if (isset($_SESSION['table'])) {
                    print_r($_SESSION['table']);

                    switch($_SESSION['table']){

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
                                    echo '<td><button name="rowClass" value="'.$row->getClassId().'">'.($loader2->getClassById($row->getClassId()))->getName().'</button></td>';
                                }
                                if ($loader2->getClassById($row->getClassId()) === null) {
                                    echo '<td>No Teacher</td></tr>';
                                } else {
                                    $teacherNew =$loader3->getTeacherByStudentId($row->getId());
                                    echo '<td><button name="rowTeacher" value="'.$teacherNew[0]['Id'].'">'.$teacherNew[0]['Name'].'</button></td></tr>';
                                }

                                echo '
                                <td></td>
                            </tr>';
                            }
                            break;

                        case 'rowClass':

                            break;

                        case 'rowTeacher':

                            break;


                        case 'class':



                            break;

                        case 'teacher':

                            break;

                    }

                }

                ?>
            </table>
        </form>
    </section>
<?php require 'includes/footer.php' ?>