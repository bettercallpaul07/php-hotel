<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Hotel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>


<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<body>
    <div class="maintable">
        <h1>Ricerca Hotel</h1>
        <?php

        echo "<table>";
        echo "<tr><th>Nome struttura</th><th>Descrizione</th><th>Parcheggio</th><th>Voto</th><th>Distanza</th></tr>";
        foreach ($hotels as $hotel) {
            echo "<tr>";
            echo "<td>" . $hotel["name"] . "</td>";
            echo "<td>" . $hotel["description"] . "</td>";
            echo "<td>";
            if ($hotel["parking"] == true) {
                echo "<span class='button true'>&#x2713;</span>";
            } else {
                echo "<span class='button false'>&#120;</span>";
            }
            echo "</td>";
            echo "<td>";
            for ($i = 1; $i <= $hotel["vote"]; $i++) {
                echo "<span class='star'>&#9733;</span>";
            }
            for ($i = 1; $i <= (5 - $hotel["vote"]); $i++) {
                echo "<span class='star'>&#9734;</span>";
            }
            echo "</td>";
            echo "<td>" . $hotel["distance_to_center"] . "</td>";
        }
        echo "</tr>";
        echo "</table>";
        ?>
    </div>
</body>

</html>