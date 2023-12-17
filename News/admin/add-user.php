<?php 
include("header.php"); 
if($_SESSION['user_role']=='0'){
    header("location: {$hostname}/admin/post.php");
}

if(isset($_POST['save'])){
    include("config.php");
    $fName = mysqli_real_escape_string($conn, $_POST['firstName']) ;
    $lName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $role = mysqli_real_escape_string($conn, $_POST['userRole']);

    $sql = "SELECT username FROM user WHERE username = '$userName'";
     $result = mysqli_query($conn, $sql) or die("Query failed");

     if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Username already exists');</script>";
     }else{
        $sql1 = "INSERT INTO user (first_name, last_name, username, password, role) VALUES ('$fName', '$lName', '$userName', '$password', '$role')";
        if(mysqli_query($conn,$sql1)){
            header("location: $hostname/admin/user.php");
        }
       
     }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add User Form</title>
</head>
<body>
 

<div class="adduser-container">
    <h2>Add User</h2>
    <form id="addUserForm" method="POST"  action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="userRole">User Role:</label>
            <select id="userRole" name="userRole" required>
                <option value="0">Normal User</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="save">Add User</button>
        </div>
    </form>
</div>

</body>
</html>
