<?php
include ('db.php');

if(isset($_GET['id_name']))
{
    $id = $_GET['id_name'];
    $sql = "DELETE FROM user WHERE id='$id'";
    mysqli_query($conn,$sql);
    header("location:index.php");
}
?>