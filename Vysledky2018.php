<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detva behá tak sa pridaj</title>
    <!-- CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script crossorigin="anonymous"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script crossorigin="anonymous"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="img/logo.png" rel="icon" type="image/png">
    <link href="1.css" rel="stylesheet">


</head>
<body class="telo">

<?php
include 'header.php'
?>

<div class="col-lg-8 text">
    <br><br>

    <div class="text-center">
        <h2 class="nadpis"><strong> VÝSLEDKY 2018 </strong></h2>
    </div>


    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="mySlides  carousel-item active">
                <img class="d-block w-100" src="img/v21.png" alt="First slide">
            </div>
            <div class="mySlides carousel-item">
                <img class="d-block w-100" src="img/v22.png" alt="Second slide">
            </div>
            <div class="mySlides carousel-item">
                <img class="d-block w-100" src="img/v23.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev sipka" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" onclick="plusDivs(-1)">&#10094;</span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next sipka" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" onclick="plusDivs(-1)">&#10094;</span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div>
        <?php
        include 'footer.php'
        ?>
    </div>
</div>


</body>
</html>