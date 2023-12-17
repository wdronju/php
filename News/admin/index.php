<?php
include("config.php");



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<body>


    


    <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-button" name="login">Login</button>
        </form>
            

        <?php
        if(isset($_POST['login'])){
            

            $username = mysqli_real_escape_string($conn,$_POST['username']);
            $password = md5($_POST['password']);

            $sql = "SELECT 
            user_id, 
            username,
            role 
            FROM user WHERE 
            username = '$username' 
            AND 
            password = '$password'";

            $result = mysqli_query($conn,$sql) or die("Query failed");
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){

                session_start();
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_role'] = $row['role'];
                header("location: {$hostname}/admin/post.php");

                }
            }else{
                echo "<div class='errorAlert'> Username and Password not Matched. </div>";
            }


        }

        
        
        ?>
    </div>

</body>

</html>