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

//imposto una variabile ad un valore di default; se è impostato il filtro allora la riempio con quel valore (sia per il parcheggio che per i voti)
$parkingFilter = null;

if (isset($_GET["parking"])) {
    $parkingFilter = $_GET("parking");
};

$voteFilter = 0;

if (isset($_GET["vote"])) {
    $voteFilter = $_GET("vote");
};

//---------------------------------------------------------

$filteredHotels = [];

foreach ($hotels as $hotel) {
    $addHotel = true;


    if (($parkingFilter == "1"
            &&
            $hotel["parking"] == false
        )

        ||

        ($parkingFilter == "0"
            &&
            $hotel["parking"] == true
        )

    ) {
        $addHotel = false;
    }

    if ($hotel["vote"] < $voteFilter) {
        $addHotel = false;
    }

    if ($addHotel == true) {
        $filteredHotels = $hotel;
    }
}


?>

<body>
    <div class="maintable">
        <h1>Ricerca Hotel</h1>


        <form action="" method="get">
            <label>Parcheggio disponibile</label>
            <select name="parking">
                <option value="" selected="selected">Indifferente</option>
                <option value="1">Presente</option>
                <option value="0">Assente</option>
            </select>

            <label>Punteggio recensioni</label>
            <select name="vote">
                <option value="" selected>Qualsiasi recensione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button type="submit">Avvia ricerca</button>
        </form>

        <?php


        var_dump($parkingFilter);
        var_dump($voteFilter);
        var_dump($filteredHotels);


        echo "<table>";
        echo "<tr><th>Nome struttura</th><th>Descrizione</th><th>Parcheggio</th><th>Voto</th><th>Distanza</th></tr>";

        foreach ($filteredHotels as $hotel) {

            echo "<tr>";
            echo "<td>" . $hotel["name"] . "</td>";
            echo "<td>" . $hotel["description"] . "</td>";
            echo "<td>";

            if ($hotel["parking"] == true) {
                echo "<span class='button true'>&#x2713;</span>";
            } else {
                echo "<span class='button false'>X</span>";
            };

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
        };
        echo "</tr>";
        echo "</table>";

        ?>

    </div>
</body>

</html>