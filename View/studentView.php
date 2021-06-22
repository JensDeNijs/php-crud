<?php require 'includes/header.php' ?>
    <section>
        <h4>Student Table</h4>
        <p><a href="index.php">Back to homepage</a></p>
        <p><a href="index.php?page=studentView">Student Table</a></p>
        <p><a href="index.php?page=classView">Class Table</a></p>
        <p><a href="index.php?page=teacherView">Teacher Table</a></p>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>ClassID</th>
            </tr>
            <?php

            foreach ($data as $row) {
                echo '<tr><td>' . $row->getId() . '</td><td>' . $row->getName() . '</td><td>' . $row->getEmail() . '</td><td>' . $row->getClassId() . '</td><td><button name="update" value="' . $row->getClassId() . '">Update</button></td><td><button name="delete" value="' . $row->getClassId() . '">Delete</button></td></tr>';
            }
            ?>
        </table>
    </section>
<?php require 'includes/footer.php' ?>