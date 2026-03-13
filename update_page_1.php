<?php include("header.php") ?>

<?php include("dbcon.php") ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "select * from student where id =$id ";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("query Failed" . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}



?>

<?php
if (isset($_POST['update_student'])) {
    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    $query = " update student set firstName = '$fname', lastName = '$lname',age= '$age' where id='$idnew'";
     

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("query Failed" . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=you have successfully updated the data.');
    }
}


?>




<form action="update_page_1.php?id_new=<?php echo $id; ?> " method="post">
    <div class="form-group">
        <label for="f_name">first Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['firstName'] ?>">
    </div>
    <div class="form-group">
        <label for="l_name">last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['lastName'] ?>">
    </div>
    <div class="form-group">
        <label for="age">age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>">
    </div>

    <input type="submit" class="btn btn-success" name="update_student" value="UPDATE">
</form>


<?php include("footer.php") ?>;