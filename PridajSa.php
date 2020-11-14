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
    <link href="http://www.detvabehataksapridaj.6f.sk/assets/images/logo.png" rel="icon" type="image/png">
    <link href="1.css" rel="stylesheet">


</head>
<body class="telo">

<?php
include 'header.php'
?>


<div class="col-lg-8 text">
    <div class="text-center">
        <br>
        <h2 class="nadpis"><strong> Pridaj sa! </strong></h2>
        <br>
    </div>

    <form id="form">
        <div class="form-row col-lg-10 stred">
            <div class="form-group col-lg-6">
                <label><b>Meno</b></label>
                <input type="text" class="form-control" placeholder="Meno " name="meno" required>
            </div>
            <div class="form-group col-lg-6">
                <label><b>Priezvisko</b></label>
                <input type="text" class="form-control" placeholder="Priezvisko " name="priezvisko" required>
            </div>
            <div class="form-group col-md-12">
                <label><b>Dátum narodenia:</b></label>
                <input type="date" class="form-control" name="birthday" required>
            </div>
            <div class="form-group col-md-12">
                <label for="inputEmail4"><b>Email</b></label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
            </div>
            <fieldset class="form-group col-md-12">
                <div class="row">
                    <div class="col-form-label col-sm-2 pt-0"><b>Dĺžka trate</b></div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dlzkaTrate" id="gridRadios1"
                                   value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                4,5 km
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dlzkaTrate" id="gridRadios2"
                                   value="option2">
                            <label class="form-check-label" for="gridRadios2">
                                12,5 km
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group col-md-12"><br>
                <div class="form-check col-md-12 ">
                    <input class="form-check-input" type="checkbox" id="gridCheck" value="true" name="suhlas" required>
                    <label class="form-check-label" for="gridCheck">
                        Súhlasím so spracovaním svojich údajov pre potreby organizátora.
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary col-md-12">Odoslať</button>
            </div>
        </div>

    </form>
    <br><br>

    <div class="col-lg-8 text">
        <div class="text-center">
            <br>
            <h2 class="nadpis"><strong> Zoznam prihlásených: </strong></h2>
            <br>
        </div>
    </div>

    <?php
    include 'footer.php'
    ?>
</div>


</body>
</html>

$(document).ready(function() {
// Variable to hold request
var request;

// Bind to the submit event of our form
$("#foo").submit(function(event){

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "/form.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});
});
        action="/FormSent.php" method="post";
