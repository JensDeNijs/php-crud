<?php require 'includes/header.php' ?>
    <section>
        <h4>Info page</h4>

        <p><a href="index.php">Back to homepage</a></p>
        <form action="" method="POST">
            <p>
                <button type="submit" name="btn" value="student">Student</button>
                <button type="submit" name="btn" value="class">Class</button>
                <button type="submit" name="btn" value="teacher">Teacher</button>
            </p>
        </form>
        <table>
            <?php
            if (isset($POST["btn"])) {
                if($POST["btn"]==="student"){
                    echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>ClassID</th></tr>';
                    foreach ($data as $row) {
                        echo '<tr><td>'.$row->getId().'</td><td>'.$row->getName().'</td><td>'.$row->getEmail().'</td><td>'.$row->getClassId().'</td></tr>';
                    }
                }elseif($POST["btn"]==="class"){
                    echo '<tr><th>ID</th><th>Name</th><th>Location</th><th>TeacherID</th></tr>';
                    foreach ($data as $row) {
                        echo '<tr><td>'.$row->getId().'</td><td>'.$row->getName().'</td><td>'.$row->getLocation().'</td><td>'.$row->getTeacherId().'</td></tr>';
                    }
                }elseif($POST["btn"]==="teacher"){
                    echo '<tr><th>ID</th><th>Name</th><th>Email</th></tr>';
                    foreach ($data as $row) {
                        echo '<tr><td>'.$row->getId().'</td><td>'.$row->getName().'</td><td>'.$row->getEmail().'</td></tr>';
                    }
                }
            }

            ?>
        </table>
    </section>
<?php require 'includes/footer.php' ?>