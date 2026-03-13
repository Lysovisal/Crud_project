<?php
include 'dbcon.php';
if(isset($_POST['add_students'])){
   
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];


    if($fname == "" || empty($fname)){
        header('location:index.php?message=you need to fill in the first name!');

    }elseif($lname == "" || empty($lname)){
        header('location:index.php?message=you need to fill in the last name!');

    }elseif($age == "" || empty($age)|| $age<=0 ){
        header('location:index.php?message=you need to fill in the age!');

    }

    else{

    $query = "insert into student (firstName,lastName,age ) values ('$fname',
    '$lname','$age')";

    $result = mysqli_query($connection,$query);

    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }else{
        header('location:index.php?insert_msg=your data has been added successfully');
    }
    

}

}

?>