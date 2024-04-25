<?php
include('dbcon.php');
    if(isset($_POST['add_students'])){
        
        $name = $_POST['Name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];

        if($name == "" || empty($name)){
            header('location:index.php?message=You need to fill in the Name!');
        }

        if($last_name == "" || empty($last_name)){
            header('location:index.php?message=You need to fill in the Last_name!');
        }

        if($age == "" || empty($age)){
            header('location:index.php?message=You need to fill in the Age!');
        }


        else{

            $query = "insert into `section` (`name`,`last_name`, `age`) values ('$name','$last_name','$age')";
            
            $result = mysqli_query($connection, $query);

            if(!$result){
                die("Query Failed". mysqli_error($connection));

            }
            else{
                header('location:index.php?insert_msg=Your data has been added successfully');
            }
        }
}

?>