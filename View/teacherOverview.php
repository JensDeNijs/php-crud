<?php
require 'includes/header.php' ?>
    <section>
        <h4>Student Table</h4>
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
                <th>Students</th>
            </tr>

            <tr>
                <td><?php echo $data3->getId()?></td>
                <td><?php echo $data3->getName()?></td>
                <td><?php echo $data3->getEmail()?></td>
                <td><a href="">Show all <?php echo $students?> students</a></td>
            </tr>
        </table>

    </section>
<?php require 'includes/footer.php' ?>