<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Student Data Update Form</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="form-container">
        <h2>Delete Records</h2><br><br>

        <!-- get id   -->
        <form method="GET" action="delete.php">
            <label>Id</label>
            <input type="number" name="id" id="" placeholder="Enter id here..">
            <input type="submit" name="sowbtn" value="Delete Data">
        </form>

    </div>

</body>

</html>