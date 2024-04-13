<?php 
include 'connection.php'; // Include the connection file to define $con variable
$id=$_GET['id'];
$select="SELECT * FROM `task` WHERE id='$id'";
$data=mysqli_query($con,$select);
$row=mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Task Manager</h2>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" value="<?php echo $row['tittle'] ?>" class="form-control" name="tittle" placeholder="Title" required>
            </div>
            <div class="form-group">
                <input type="date"  value="<?php echo $row['starting_date'] ?>"class="form-control" name="starting_date" placeholder="Starting Date" required>
            </div>
            <div class="form-group">
                <input type="date"value="<?php echo $row['ending_date'] ?>" class="form-control" name="ending_date" placeholder="Ending Date" required>
            </div>
            <div class="form-group">
                <input type="text"value="<?php echo $row['status'] ?>" class="form-control" name="status" placeholder="Status" required>
            </div>
            <button type="update" class="btn btn-primary mr-2" name="update_btn">Save</button>
            <a href="view.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
    <?php
    if(isset($_POST['update_btn']))
    {
        $tittle = $_POST['tittle'];
        $s_date = $_POST['starting_date'];
        $e_date = $_POST['ending_date'];
        $status = $_POST['status'];
        $update = "UPDATE `task` SET `tittle`='$tittle',`starting_date`='$s_date',`ending_date`='$e_date',`status`='$status' WHERE id=$id";
        $data = mysqli_query($con, $update);
        if($data) {
            echo "<script>alert('Data updated successfully');
            window.open('http://localhost/p1/view.php','_self');
            </script>";
        } else {
            echo "<script>alert('Failed to update data');</script>";
        }
    }
    ?>
</body>
</html>
