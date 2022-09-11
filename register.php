<?php
include "connection.php";
if (isset($_POST['username']) && ($_POST['password'])) {
    $username =  $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user = "INSERT INTO `users` (username, `password`)
        VALUES ('$username', '$password')";
    if ($conn->query($user) === FALSE) {
        echo "error" . $user . "<br />" . $conn->error;
    } else {
        header("location: login.php");
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" value="" name="username" id="id6" placeholder="Gebruikersnaam" required>
        <input type="text" value="" name="password" id="id6" placeholder="wachtwoord" required>
        <input style="background: #0bca6a; border: 0;" type="submit" class="button-action authenticator--submit" id="id4" name="submit" value="Registreer">
    </form>
    <ul>
        <li><a href="login.php">Terug</a></li>
    </ul>
</body>

</html>