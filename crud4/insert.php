<?php
include("connect.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $file_name =  $_FILES['image']['name'];
    $tmp_loc = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];
   

    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');

    if (in_array($file_type, $allowed_types) && $file_size <= 3000000) {
        $upload = "images/" . $file_name;
        move_uploaded_file($tmp_loc, $upload);

        $sql = "INSERT INTO `user`(`name`, `email`, `phone`, `address`, `imageName`) VALUES ('$name','$email','$phone','$address','$file_name')";
        $query = mysqli_query($conn, $sql);

        if ($query == true) {
            header('Location: index.php');
            exit();
        }
    } else {
        echo "<div style=' background-color: rgba(255, 0, 0, 0.274);
        color: rgb(175, 0, 0);
        text-align: center;
        padding: 10px;'>Insert not done. Invalid file type or size.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <a href="insert.php"><i class="fa-solid fa-user-plus"></i>Add User</a>
            <a href="index.php">Home</a>
            <a href="index.php"><i class="fa-solid fa-users-between-lines"></i><b>Totall User: </b><?php
                                                                                                    $sql = "SELECT * FROM `user`";
                                                                                                    $result = mysqli_query($conn, $sql);
                                                                                                    $number_of_rows = mysqli_num_rows($result);
                                                                                                    echo $number_of_rows;
                                                                                                    ?></a>
        </div>
    </div>

    <div class=" formcontainer">
        <div class="formbox">
            <form id="myForm" method="POST" enctype="multipart/form-data">
                <h3 style="text-align: center;">Insert Data</h3><br>
                <hr><br>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter Your Name..">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="Enter Your Email..">
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter Your Phone Number..">
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="Enter Your Address..">
                </div>
                <div class="form-group">
                    <label for="address">Select your profile image:</label>
                    <input type="file" id="image" name="image">
                </div>
                <input type="text" name="id" hidden>
                <p class="error-message" id="errorMessage"></p>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>




    <script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission
            }
        });

        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('address').value;

            // Check if any field is blank
            if (name === "" || email === "" || phone === "" || address === "") {
                document.getElementById('errorMessage').innerHTML = "All fields are required !";
                setTimeout(function() {
                    document.getElementById('errorMessage').innerHTML = ""; // Clear error message
                }, 6000); // 6000 milliseconds = 6 seconds
                return false; // Prevent form submission
            } else {
                document.getElementById('errorMessage').innerHTML = ""; // Clear error message
                return true; // Allow form submission
            }
        }
    </script>
</body>

</html>