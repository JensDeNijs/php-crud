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

            <tr>
                <td><?php echo $data3->getId()?></td>
                <td><?php echo $data3->getName()?></td>
                <td><?php echo $data3->getEmail()?></td>
                <td><?php echo (($loader2->getClassById($data3->getClassId()))->getName())?></td>
                <td><?php echo $teacherNew[0]['Name']?></td>
            </tr>
        </table>
    </section>


<?php require 'includes/footer.php' ?>