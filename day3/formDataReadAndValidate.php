<?php
$nameError = "";
$emailError = "";
$passError = "";
$displayUserName = "";
$displayEmail = "";

if (isset($_POST['submit'])) {
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($userName)) {
        $nameError = "Name is Required.";
    }

    if (empty($email)) {
        $emailError = "Email is Required.";
    }

    if (empty($password)) {
        $passError = "Password is Required.";
    } else {
        if (strlen($password) <= 8) {
            $passError = "insert At least 8 digits";
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $passError = "Insert at least one small char";

        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $passError = "Insert at least one uppercase char";

        } elseif (!preg_match("#[0-9]+#", $password)) {
            $passError = "Insert at least one digit";

        }
    }

    // If there are no errors, display the name and email
    if (empty($nameError) && empty($emailError) && empty($passError)) {
        $displayUserName = $userName;
        $displayEmail = $email;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handle</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section>
        <div class="container">
            <h2>Lets Make a form</h2>

            <form id="form" action="" method="POST">
                <label for="username">User Name<span style='color:red;'>*</span> </label><br>
                <input type="text" name="username"> <br>
                <span style='color:red;'><?php echo $nameError; ?></span>
                <br>

                <label for="email">Email <span style='color:red;'>*</span> </label><br>
                <input type="email" name="email"> <br>
                <span style='color:red;'><?php echo $emailError; ?></span><br>

                <label for="password">Password<span style='color:red;'>*</span> </label>
                <br> <input type="password" name="password"> <br>
                <span style='color:red;'><?php echo $passError; ?></span><br>

                <input type="submit" name="submit" value="Submit" id="submit">
            </form>

            <?php if (!empty($displayUserName) && !empty($displayEmail)) : ?>
                <div>
                    <h3>Submitted Information:</h3>
                    <p>Name: <?php echo $displayUserName; ?></p>
                    <p>Email: <?php echo $displayEmail; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>

</body>

</html>
