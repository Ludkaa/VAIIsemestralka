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

            $("#form").submit(function (event) {

                event.preventDefault();

                let $form = $(this);

                let $inputs = $form.find("input, select, button, textarea");

                let data = JSON.stringify(getFormData($form));

                $inputs.prop("disabled", true);

                $.ajax({
                    url: "https://dbtspapi.herokuapp.com/runner",
                    type: "post",
                    data: data,
                    dataType: "json",
                    success: function(msg) {
                        window.location.href="/FormSent.php";
                    },
                    error: function(e) {
                        $inputs.prop("disabled", false);
                        console.log(e);
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
include 'header.php';
if((!empty($_SESSION['valid']))) {
    $_SESSION['valid']=1;
} else {
    $_SESSION['valid']=0;
}


$url = "https://dbtspapi.herokuapp.com/runner/".$_GET['id'];
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

$Data = json_decode($response)->data;
$meno=$Data->meno;
$priezvisko=$Data->priezvisko;
$datum=$Data->birthday;
$email=$Data->email;
$trat=$Data->trat;
?>


<div class="col-lg-8 text">
    <div class="text-center">
        <br>
        <h2 class="nadpis"><strong> Editovanie účastníka </strong></h2>
        <br>
    </div>

    <form id="form">
        <div class="form-row col-lg-10 stred">
            <div class="form-group col-lg-6">
                <label><b>Meno</b></label>
                <input type="text" class="form-control" placeholder="Meno " name="meno" value="<?php echo $meno ?>" required>
            </div>
            <div class="form-group col-lg-6">
                <label><b>Priezvisko</b></label>
                <input type="text" class="form-control" placeholder="Priezvisko " name="priezvisko" value="<?php echo $priezvisko ?>" required>
            </div>
            <div class="form-group col-md-12">
                <label><b>Dátum narodenia:</b></label>
                <input type="date" class="form-control" name="birthday" value="<?php echo $datum ?>" required>
            </div>
            <div class="form-group col-md-12">
                <label for="inputEmail4"><b>Email</b></label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?php echo $email ?>" required>
            </div>
            <fieldset class="form-group col-md-12">
                <div class="row">
                    <div class="col-form-label col-sm-2 pt-0"><b>Dĺžka trate</b></div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="trat" id="gridRadios1"
                                   value="4,5 km" <?php if(('4,5 km' == $trat)) { echo "checked";} ?> required >
                            <label class="form-check-label" for="gridRadios1">
                                4,5 km
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="trat" id="gridRadios2"
                                   value="12,5 km" <?php if(('12,5 km' == $trat)) { echo "checked";} ?> required >
                            <label class="form-check-label" for="gridRadios2">
                                12,5 km
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group col-md-12"><br>
                <div class="form-check col-md-12 ">
                    <input class="form-check-input" type="checkbox" id="gridCheck" value="true" name="suhlas" checked required>
                    <label class="form-check-label" for="gridCheck">
                        Súhlasím so spracovaním svojich údajov pre potreby organizátora.
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" id="" class="btn btn-primary col-md-12">Upraviť</button>

                <script>
                    $("#edit".click(function (event) {
                        $.ajax({
                            type:'PUT',
                            url: <?php echo $url ?>,
                            success: function(msg) {
                                alert("Bežec bol upravený");
                                location.reload();
                            },
                            error: function(e) {
                                $inputs.prop("disabled", false);
                                console.log(e);
                                alert("Nastala chyba");
                            }
                        })
                    })
                </script>

            </div>
        </div>

    </form>
    <br><br>




</body>
</html>