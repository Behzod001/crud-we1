<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
<h2>All Students</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
</div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last_Name</th>
                    <th>Age</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $query = "select * from `section` ";

                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query failed".mysqli_error($connection));
                
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['last_name'];  ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><a href="update_page_1.php?id=<?php echo $row['id'];  ?>" class="btn btn-success">Update</a></td>
                                <td><a href="delete_page.php?id=<?php echo $row['id'];  ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                
               
            </tbody>

        </table>

        <?php
        
        if(isset($_GET['message'])){
            echo "<h6>".$_GET['message']."</h6>";
        }

        ?>
        <?php
        
        if(isset($_GET['insert_msg'])){
            echo "<h5>".$_GET['insert_msg']."</h5>";
        }

    ?>
     <?php
        
        if(isset($_GET['update_msg'])){
            echo "<h5>".$_GET['update_msg']."</h5>";
        }

    ?>
    <?php
        
        if(isset($_GET['delete_msg'])){
            echo "<h5>".$_GET['delete_msg']."</h5>";
        }

    ?>

<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h4>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="last_name">Last_Name</label>
                    <input type="text" name="last_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control">
                </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success" name="add_students" value="ADD">
        </div>
        </div>
    </div>
    </div>
</form>
<?php include('footer.php'); ?>