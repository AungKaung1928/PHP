<?php
include ('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php project</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 border py-3 shadow mt-3">
                <h3 class="text-center">CURD with Procedure</h3>
    <?php 
    if(isset($_GET['id'])) 
    {    
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    ?>
    <!-- update form -->
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row ['id']; ?>">
        <input type="text" value="<?php echo $row['name']; ?>" placeholder="Enter Username" class="form-control mb-2" name="name" id="" autocomplete="off">
        <input type="text" value="<?php echo $row['email']; ?>" placeholder="Enter Email" class="form-control mb-2" name="email" id="">
        <button class="btn btn-success mt-2 mb-1">Update</button>
    </form>
    <?php }   else { ?>
    <!-- create form -->
    <form method="POST" action="insert.php">
        <input type="text" placeholder="Enter Username" class="form-control mb-2" name="name" id="" autocomplete="off">
        <input type="text" placeholder="Enter Email" class="form-control mb-2" name="email" id="">
        <button class="btn btn-success mt-2 mb-1">Create</button>
    </form>


<?php }  ?>


                <!-- 1. name 2. method(GET or POST) 3.action (Location)-->
               
            </div>
        </div>
        <div class="row mt-5">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Modified Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <!-- select query -->
                <?php
                //SELECT name, email is also okay
                $sql = "SELECT * FROM user";
                $query = mysqli_query($conn, $sql);
                //two things, loop(For more than 1 row) and associate array(key,value)
                while ($row = mysqli_fetch_assoc($query)) 
                { ?>          
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td> 
                        <td><?php echo $row['created_date']; ?></td>
                        <td><?php echo $row['modified_date']; ?></td>
                        <td><a href="index.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-info">Edit</a></td>
                        <td><a href="delete.php?id_name=<?php echo $row['id']; ?>" class="btn btn-warning">Delete</a></td>
                    </tr>
                    <?php }?>
            </table>
        </div>
    </div>
</body>

</html>




