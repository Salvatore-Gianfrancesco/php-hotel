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

/* foreach ($hotels as $hotel) {
    echo "$hotel[name]: $hotel[vote] stars.<br>Distance to center: $hotel[distance_to_center]Km<br><br>";
} */

if (isset($_GET['parking'])) {
    $parking_filter = $_GET['parking'];
} else {
    $parking_filter = -1;
}

if (isset($_GET['vote'])) {
    $vote_filter = $_GET['vote'];
} else {
    $vote_filter = -1;
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>
</head>

<body class="bg-dark text-light">
    <form action="index.php" method="GET">
        <div class="d-flex justify-content-end align-items-center gap-4 m-3">
            <!-- parking filter -->
            <div>
                <label for="parking">Parcheggio: </label>
                <span>Si</span>
                <input type="radio" name="parking" id="parking" value="1">
                <span>No</span>
                <input type="radio" name="parking" id="parking" value="0">
            </div>

            <!-- vote filter -->
            <div>
                <select class="form-select" name="vote" id="vote">
                    <option disabled selected>Star rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <!-- submit & reset -->
            <button type="submit" class="btn btn-light">Submit</button>
            <button type="reset" class="btn btn-light">Reset</button>
        </div>

    </form>

    <div class="container">
        <h1 class="text-center my-5">Hotel list</h1>


        <div class="row row-cols-5">
            <?php foreach ($hotels as $hotel) : ?>
                <?php if (($parking_filter === -1 || $hotel['parking'] == $parking_filter) && ($vote_filter === -1 || $hotel['vote'] == $vote_filter)) : ?>
                    <div class="col">
                        <div class="card bg-light text-dark pt-2 pb-5 px-2">
                            <!-- hotel name -->
                            <h3><?= $hotel['name'] ?></h3>

                            <hr>

                            <!-- hotel description -->
                            <p><?= $hotel['description'] ?></p>

                            <!-- hotel parking -->
                            <div>Parcheggio: <?= ($hotel['parking'] ? 'SI' : 'NO') ?></div>

                            <!-- hotel vote -->
                            <div>Voto: <?= $hotel['vote'] . ' ' . ($hotel['vote'] === 1 ? 'stella' : 'stelle') ?></div>

                            <!-- hotel distance to center -->
                            <div>Distanza dal centro: <?= $hotel['distance_to_center'] ?>Km</div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8' crossorigin='anonymous'></script>
</body>

</html>