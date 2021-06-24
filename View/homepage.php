<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>
    <h4>Hello <?php echo $user->getName()?>,</h4>

    <p><a href="index.php?page=studentView">Student Table</a></p>
    <p><a href="index.php?page=classView">Class Table</a></p>
    <p><a href="index.php?page=teacherView">Teacher Table</a></p>
    <p><a href="index.php?page=info">Info Table</a></p>
    <p>Put your content here.</p>
</section>
<?php require 'includes/footer.php'?>