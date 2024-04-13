<?php include 'connection.php' ?>
<html>
<head>
    <title>Task Manager</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Task Manager</h2>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="tittle" placeholder="Title" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="starting_date" placeholder="Starting Date" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="ending_date" placeholder="Ending Date" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="status" placeholder="Status" required>
            </div>
            <button type="submit" class="btn btn-primary mr-2" name="save_btn">Save</button>
            <a href="view.php" class="btn btn-secondary">View</a>
        </form>
    </div>
    <?php
    if(isset($_POST['save_btn']))
    {
        $tittle = $_POST['tittle'];
        $s_date = $_POST['starting_date'];
        $e_date = $_POST['ending_date'];
        $status = $_POST['status'];
        $query = "INSERT INTO `task` (tittle, starting_date, ending_date, status) VALUES ('$tittle', '$s_date', '$e_date', '$status')";
        $data = mysqli_query($con, $query);
        if($data) {
            echo "<script>alert('Data inserted successfully');</script>";
        } else {
            echo "<script>alert('Failed to insert data');</script>";
        }
    }
    ?>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
