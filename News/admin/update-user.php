<?php 
include("header.php"); 

if($_SESSION['user_role']=='0'){
    header("location: {$hostname}/admin/post.php");
}


$get_id = $_GET['id'];
include("config.php");
$sql = "SELECT * FROM user WHERE user_id = $get_id";
$result = mysqli_query($conn, $sql) or die("Query failed");

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);

    $id = $row['user_id'];
    $fName = $row['first_name'];
    $lName = $row['last_name'];
    $userName = $row['username'];
    $pass = $row['password'];
    $role = $row['role'];
}



?>
<!-- Update user   -->
<?php  

if(isset($_POST['update'])){
    include("config.php");
    $u_id = $_POST['u_id'];
    $u_fName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $u_lName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $u_userName = mysqli_real_escape_string($conn, $_POST['username']);
    $u_role = mysqli_real_escape_string($conn, $_POST['userRole']);

    $sql2 = "UPDATE user SET 
    first_name='$u_fName',
    last_name='$u_lName',
    username='$u_userName',
    role='$u_role' WHERE user_id = $u_id";
    // Remove the semicolon at the end

    $result = mysqli_query($conn, $sql2) or die("Query failed");

    if($result){
        header("location: $hostname/admin/user.php");
    } else {
        echo "Error: " . mysqli_error($conn);
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
    <h2>Update User</h2>
    <form id="addUserForm" method="POST"  action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input hidden type="text" id="id" name="u_id" value="<?php echo $id; ?>" required>

            <input type="text" id="firstName" name="firstName" value="<?php echo $fName; ?>" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $lName; ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $userName; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="userRole">User Role:</label>
            <select id="userRole" name="userRole" required>
                <?php 
                      if($row['role'] == 0){
                        echo " <option value='0' selected>Normal User</option>
                        <option value='1'>Admin</option>";
                    }else{
                        echo " <option value='0' >Normal User</option>
                        <option value='1' selected>Admin</option>";
                    }
    
                
                ?>
               
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="update">Update User</button>
        </div>
    </form>
</div>

</body>
</html>
