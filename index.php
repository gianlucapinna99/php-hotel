<?php
    // includo l'array degli hotel
    require_once 'hotels.php';

    // se la richiesta GET è presente e il valore di parcheggio è 'true', filtro gli hotel che hanno il parcheggio
    if (isset($_GET['parcheggio']) && $_GET['parcheggio'] == 'true') {
        $hotels = array_filter($hotels, function ($hotel) {
            return $hotel['parking'] == true;
        });
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- TITLE -->
    <h1 class="text-center mt-5">HOTELS</h1>


    <div class="container mt-5">

       <!-- FORM TO FILTER ELEMENTS -->
        <form class="d-flex align-items-center gap-3 mb-4 form-box" action="index.php" method="GET">
            <div class="form-group">
                <label for="parcheggio">Hotel con parcheggio:</label>
                <input type="checkbox" name="parcheggio" id="parcheggio" value="true">
            </div>
            <button type="submit" class="btn btn-primary">Filtra</button>
        </form>

        <!-- TABLE -->
        <table class="table mt-3 p-4 table-borderless">
            
            <!-- FIRST ROW -->
            <thead>
                <tr>
                    <th class="padding-content">Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>

            <!-- TABLE ELEMENTS -->
            <tbody>
                <?php foreach ($hotels as $hotel): ?>
                    <tr>
                        <td class="padding-content"><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Si' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?> km</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>