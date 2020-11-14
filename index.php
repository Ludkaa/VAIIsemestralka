<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detva behá tak sa pridaj</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="1.css">
    <link rel="icon" type="image/png" href="http://www.detvabehataksapridaj.6f.sk/assets/images/logo.png">


</head>
<body>

<?php
    include 'header.php'
?>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="false">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100"  src="img/1.jpg" alt="img1" >
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/2.jpg" alt="img2" >
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/3.jpg" alt="img3" >
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container marketing">

<hr class="featurette-divider ">

<div class="row featurette basnicka" >
    <div class="col-lg-6 text-center align-items-center" >
        <p class="lead"> <p class="mbr-text mb-0 mbr-fonts-style display-7">
        "Beh nás spája, to každý vie,<br>
        či si náš, a či ešte nie,<br>
        rodina je veľká dosť,<br>
        vítaný je každý hosť.<br>
        <br>
        Zober brata, otca, mamu,<br>
        príďte behať pod Poľanu!<br>
        V Detve na Vás čakáme,<br>
        zahanbiť sa nedáme."
    </p>
    </div>
    <div class="col-lg-6">
        <img class= "logo2" src="http://www.detvabehataksapridaj.6f.sk/assets/images/logo.png" alt="logo2">
    </div>
</div>

    <hr class="featurette-divider">
</div>

    <div class="video col-lg-6 embed-responsive embed-responsive-16by9">
        <iframe class=" embed-responsive-item" src="https://www.youtube.com/embed/jONQjtSeQ4U" allowfullscreen></iframe>
    </div>

<?php
include 'footer.php'
?>



</body>
</html>

