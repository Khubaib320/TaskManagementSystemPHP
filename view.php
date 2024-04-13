<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        /* Custom style for edit button */
        .edit-btn {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
        }
        .edit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Task List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>TITLE</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `task`";
                $data = mysqli_query($con, $query);
                $result = mysqli_num_rows($data);
                if($result) {
                    while($row = mysqli_fetch_assoc($data)) {
                        echo "<tr>";
                        echo "<td>" . $row['tittle'] . "</td>";
                        echo "<td>" . $row['starting_date'] . "</td>";
                        echo "<td>" . $row['ending_date'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td><a class='edit-btn' href='update.php?id=" . $row['id'] . "'>Edit</a></td>";
                        echo "<td><a onclick=\"return confirm('Are You Sure, You Want TO delete?')\" class='edit-btn' href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";

                             echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
