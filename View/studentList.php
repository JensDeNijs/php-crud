<?php
require 'includes/header.php' ?>
    <section>
        <h4>Info page student</h4>

        <p><a href="index.php">Back to homepage</a></p>
        <p><a href="index.php?page=studentView">Student Table</a></p>
        <p><a href="index.php?page=classView">Class Table</a></p>
        <p><a href="index.php?page=teacherView">Teacher Table</a></p>
        <p><a href="index.php?page=info">Info Table</a></p>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Class</th>
                <th>Teacher</th>
            </tr>
<?php foreach ($students as $row) {
    $teacherNew = $loader3->getTeacherByStudentId($row['Id']);
    echo '
            <tr>
                <td>' .$row['Id'].'</td>
                <td>' .$row['Name'].'</td>
                <td>' .$row['Email'].'</td>
                <td>' . (($loader2->getClassById($row['ClassId']))->getName()) . '</td>
                <td>' . $teacherNew[0]['Name'] . '</td>
            </tr>';
            }?>
        </table>
    </section>


<?php require 'includes/footer.php' ?>