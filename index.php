<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detva behá tak sa pridaj</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="1.css">
    <link href="img/logo.png" rel="icon" type="image/png">


</head>
<body>

<?php
include 'header.php'
?>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="false">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/1.jpg" alt="img1">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/2.jpg" alt="img2">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/3.jpg" alt="img3">
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

    <div class="row featurette basnicka">
        <div class="col-lg-6 text-center align-items-center">
            <p class="lead">
            <p class="mbr-text mb-0 mbr-fonts-style display-7">
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
            <img class="logo2" src="http://www.detvabehataksapridaj.6f.sk/assets/images/logo.png" alt="logo2">
        </div>
    </div>

    <hr class="featurette-divider">
</div>

<div class="video col-lg-6 embed-responsive embed-responsive-16by9">
    <iframe class=" embed-responsive-item" src="https://www.youtube.com/embed/jONQjtSeQ4U" allowfullscreen></iframe>
</div>

<div class="text-center nadpis-dbtsp">
    <h2 class="odpoc"><strong> Do pretekov zostáva </strong></h2>
</div>

    <div class="container countdown-cont col-lg-5 nadpis-prop align-center">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3"><span class="number-wrap"><span
                                class="number display-2" id="dni"></span><span mbr-text="dni" class="period display-7">dní</span><span
                                class="dot">:</span></span></div>
                <div class="col-xs-12 col-sm-6 col-md-3"><span class="number-wrap"><span
                                class="number display-2" id="hodiny"></span><span mbr-text="hodiny"
                                                                        class="period display-7">hodín</span><span
                                class="dot">:</span></span></div>
                <div class="col-xs-12 col-sm-6 col-md-3"><span class="number-wrap"><span
                                class="number display-2" id="minuty"></span><span mbr-text="minuty"
                                                                        class="period display-7">minút</span><span
                                class="dot">:</span></span></div>
                <div class="col-xs-12 col-sm-6 col-md-3"><span class="number-wrap"><span
                                class="number display-2" id="sekundy"></span><span mbr-text="sekundy"
                                                                        class="period display-7">sekúnd</span></span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var datumPretekov = new Date("Apr 22, 2021 15:37:25").getTime();

    var x = setInterval(function () {

        var teraz = new Date().getTime();

        var zostavajuciCas = datumPretekov - teraz;

        var dni = Math.floor(zostavajuciCas / (1000 * 60 * 60 * 24));
        var hodiny = Math.floor((zostavajuciCas % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minuty = Math.floor((zostavajuciCas % (1000 * 60 * 60)) / (1000 * 60));
        var sekundy = Math.floor((zostavajuciCas % (1000 * 60)) / 1000);

        document.getElementById("dni").innerHTML = dni  ;
        document.getElementById("hodiny").innerHTML = hodiny  ;
        document.getElementById("minuty").innerHTML = minuty  ;
        document.getElementById("sekundy").innerHTML = sekundy  ;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("odpocitavaj").innerHTML = "Dnes sú preteky";
        }
    }, 1000);
</script>


<?php
include 'footer.php'
?>


</body>
</html>

