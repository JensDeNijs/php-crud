<?php require 'includes/header.php' ?>
    <section>
        <h4>Student Table</h4>
        <p><a href="index.php">Back to homepage</a></p>
        <p><a href="index.php?page=studentView">Student Table</a></p>
        <p><a href="index.php?page=classView">Class Table</a></p>
        <p><a href="index.php?page=teacherView">Teacher Table</a></p>

        <form action="" method="POST">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>ClassID</th>
                </tr>
                <tr>
                    <td></td>
                    <td><input id="name" name="name"></td>
                    <td><input id="email" name="email"></td>
                    <td><select><?php foreach ($data2 as $dt){echo "<option value=".$dt->getId().">".$dt->getName()."</option>";}    ?></select></td>
                    <td>
                        <button name="add" value="add">Add</button>
                    </td>
                </tr>
                <?php
                foreach ($data as $row) {
                    echo '<tr><td>' . $row->getId() . '</td><td>' . $row->getName() . '</td><td>' . $row->getEmail() . '</td><td>' . ($loader2->getClassById($row->getClassId()))->getName() . '</td><td><button name="update" value="' . $row->getId() . '">Update</button></td><td><button name="delete" value="' . $row->getId() . '">Delete</button></td></tr>';
                }
                ?>

            </table>
        </form>
    </section>
<?php require 'includes/footer.php' ?>