<?php
include "connection.php";
if (isset($_POST['username']) && ($_POST['password'])) {
    $username =  $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `users` WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                sleep(3);
                if (password_verify($password, $row['password'])) {
                    $_SESSION["user_id"] = $row['id'];
                    $_SESSION["username"] = $row['username'];
                } else {
                    echo "Wachtwoord niet gevonden!";
                }
            }
        } else {
            echo "Gebruiker niet gevonden!";
        }
    }
}
if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['praktijkbegeleider_user_id'])) {
        header('Location: index.php');
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    iv class="header">
    <img src="plan van aanpak/flag_of_morocco-svg_1.png" width="90px;">
    <h1>The mocro's</h1>
    <img src="plan van aanpak/300px-Berber_flag.svg.png" width="90px;">
    </div>
    <br>
    <div id="hallo">
        <h2>Studentengids voor de 1e jaars.</h2>
    </div>
    <div class="h2">
        <h3>Welkom op de hulpgids van the mocro's. Wij gaan jullie tips geven om ervoor te zorgen dat je veel
            fouten kunt verkomen of verhelpen.
            <br>
            Bij ons op de Bit-Academy vinden wij dat de leerlingen met elkaar kunnen lachen en van elkaar kunnen leren.
            Ook vinden wij het altijd fijn als er meerdere nieuwe 1e jaars komen, daarom hebben wij deze gids gemaakt
            zodat de toekomstige leerlingen hier aan wat hebben.
            <br>
            Dit doen we op onze eigen leuke en gezellige manier.
        </h3>
    </div>

    <div class="image">
        <img src="plan van aanpak/images.jpg" width="400px;">
    </div>
    <a href="tips.php" class="next round">Volgende pagina &#8250;</a>
    <form>
        <input type="text" value="" name="username" id="id6" placeholder="Gebruikersnaam" />
        <input type="password" value="" name="password" id="id7" placeholder="Wachtwoord" />
        <input style="background: #0bca6a; border: 0;" type="submit" name="submit" value="Login">
    </form>
    <ul>
        <li><a href="register.php">nog geen account? klik hier</a></li>
    </ul>
</body>

</html>