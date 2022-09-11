<?php
include "connection.php";

if (isset($_POST['add'])) {
    $tips = $_POST['tip'];
    $query = "INSERT INTO `tips` (`tip`) VALUES ('$tips')";
    $result = $conn->query($query);
    if ($result === false) {
        echo "error" . $query . "<br />" . $conn->error;
    }
}
$query = "SELECT tip FROM tips'WHERE";
$result = $conn->query($query);
if ($result === false) {
    echo "error" . $query . "<br />" . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tip[] = $row;
        }
    }
}

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
    <div class="header">
        <img src="plan van aanpak/flag_of_morocco-svg_1.png" width="90px;">
        <h1>The mocro's</h1>
        <img src="plan van aanpak/300px-Berber_flag.svg.png" width="90px;">
    </div>
    <br>
    <div id="hallo">
        <h2>Studentengids voor de 1e jaars.</h2>
    </div>
    <div class="tips">
        <li>
            Probeer eerst zelf het probleem op te lossen en te kijken waar de fout vandaan vandaan komt. Daarmee bedoel ik zoek op internet de foutmelding op wat het doet.
        </li>
        <li>
            Wees niet bang om hulp te vragen. Iedereen maakt fouten.
        </li>
        <li>
            Kijk filmpjes/tutorials van hoe je de fout kan oplossen.
        </li>
        <li>
            Vraag een medestudent om hulp of advies.
        </li>
        <li>
            Geef nooit op! Onthoud neem kleine stappen en leer stap voor stap.
        </li>
        <?php foreach ($tip as $row) : ?>
            <li>
                <?php echo $row['tip']; ?>
            </li>
        <?php endforeach ?>
    </div>

    <form method="POST">
        <p>Heb je zelf nog tips? Laat het gerust weten</p>
        <input type="text" name="tip">
        <input type="submit" name="add">
    </form>
    <div class="image">
        <img src="plan van aanpak/tattas-be-like.jpg" width="200px;">
    </div>
    <a href="index.php" class="previous">&laquo; Vorige pagina</a>
</body>