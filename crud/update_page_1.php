<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>



    <?php
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
             
        $query = "select * from `section` where `id` = '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("query failed".mysqli_error($connection));
        
        }
        else{

            $row = mysqli_fetch_assoc($result);

            }
       

    }
    
    ?>


        <?php
        
        if(isset($_POST['update_students'])){

            if(isset($_GET['id_new'])){
                $idnew = $_GET['id_new'];
            }

            $name = $_POST['Name'];
            $last_name = $_POST['last_name'];
            $age = $_POST['age'];


            $query = "update `section` set `Name` = '$name', `last_name` = '$last_name', `age` = '$age' where `id` = '$idnew'";
            $result = mysqli_query($connection, $query);

            if(!$result){
                die("query failed".mysqli_error($connection));
        
            }
            else{
                header('location:index.php?update_msg=You have successfully updated the data');
            }
        }
        
        ?>


    <form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="Name" class="form-control" value="<?php echo $row['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last_Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
        </div>
        <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
    </form>




















<?php include('footer.php'); ?>