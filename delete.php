<?php include 'connection.php'; 
$id=$_GET['id'];
$query="DELETE  FROM `task` WHERE id='$id'";
$data=mysqli_query($con,$query);
if($data)
{
    ?>
     <script>alert('Data deleted successfully');
      ,window.open("http://localhost/p1/view.php","_self");    
    </script>;
     
    <?php


}
else{
    ?>
     <script>alert('Pls Try Agains');</script>;
    <?php
}
?>
