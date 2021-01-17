<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detva behá tak sa pridaj</title>
    <!-- CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet">
    <link href="img/logo.png" rel="icon" type="image/png">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script crossorigin="anonymous"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script crossorigin="anonymous"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>
        $(document).ready(function () {
            let request;

            function getFormData($form) {
                let unindexed_array = $form.serializeArray();
                let indexed_array = {};

                $.map(unindexed_array, function (n, i) {
                    indexed_array[n['name']] = n['value'];
                });

                return indexed_array;
            }

            $("#admin").submit(function (event) {

                event.preventDefault();

                let $form = $(this);

                let $inputs = $form.find("input, select, button, textarea");

                let data = JSON.stringify(getFormData($form));

                $inputs.prop("disabled", true);

                $.ajax({
                    url: "https://dbtspapi.herokuapp.com/adminlogin",
                    type: "post",
                    data: data,
                    dataType: "json",
                    success: function (msg) {
                        window.location.href = "/LogAdmin.php";
                    },
                    error: function (e) {
                        $inputs.prop("disabled", false);
                        console.log(e);
                        alert("Zadali ste nesprávne meno alebo heslo!");
                    }
                });
            });
        });
    </script>
    <link href="http://www.detvabehataksapridaj.6f.sk/assets/images/logo.png" rel="icon" type="image/png">
    <link href="1.css" rel="stylesheet">


</head>
<body class="telo">

<?php
include 'header.php'
?>


<div class="col-lg-8 stred">
    <div class="text-center">
        <br>
        <h2 class="nadpis"><strong> Vstup pre admina </strong></h2>
        <br>
    </div>

    <form id="admin">
        <div class="form-row col-md-5 text">
            <div class="form-group col-md-12">
                <label><b>Login</b></label>
                <input type="text" class="form-control" placeholder="Login " name="login" required>
            </div>
            <div class="form-group col-md-12">
                <label><b>Heslo</b></label>
                <input type="password" class="form-control" placeholder="Heslo " name="heslo" required>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary col-md-12">Prihlásiť sa</button>
            </div>
        </div>

    </form>
    <br><br>

    <?php
    include 'footer.php'
    ?>
</div>


</body>
</html>