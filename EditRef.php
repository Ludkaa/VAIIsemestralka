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

            $("#edit").submit(function (event) {

                event.preventDefault();

                let $form = $(this);

                let $inputs = $form.find("input, select, button, textarea");

                let data = JSON.stringify(getFormData($form));

                $inputs.prop("disabled", true);

                $.ajax({
                    url: "<?php echo "https://dbtspapi.herokuapp.com/referencia/" . $_GET['id']?>",
                    type: "put",
                    data: data,
                    dataType: "json",
                    success: function (msg) {
                        alert("Údaje boli upravené");
                        window.location.href = "/PovedaliOnas.php";
                    },
                    error: function (e) {
                        $inputs.prop("disabled", false);
                        console.log(e);
                    }
                });
            });

        });
    </script>
    <link rel="icon" type="image/png" href="img/logo.png">
    <link href="1.css" rel="stylesheet">


</head>
<body class="telo">

<?php
include 'header.php';
if ((!empty($_SESSION['valid']))) {
    $_SESSION['valid'] = 1;
} else {
    $_SESSION['valid'] = 0;
}


$url = "https://dbtspapi.herokuapp.com/referencia/" . $_GET['id'];
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

$Data = json_decode($response)->data;
$meno = $Data->meno;
$email = $Data->email;
$text = $Data->text;
?>


<div class="col-lg-8 text">
    <div class="text-center">
        <br>
        <h2 class="nadpis"><strong> Editovanie príspevku </strong></h2>
        <br>
    </div>

    <form id="edit">
        <div class="form-row col-lg-10 stred">
            <div class="form-group col-lg-6">
                <label><b>Meno</b></label>
                <input type="text" class="form-control" placeholder="Meno " name="meno" value="<?php echo $meno ?>"
                       required pattern="([A-zÀ-ž]){2,}">
            </div>
            <div class="form-group col-lg-6">
                <label for="inputEmail4"><b>Email</b></label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email"
                       value="<?php echo $email ?>" required>
            </div>
            <div class="form-group col-lg-12">
                <label><b>Text</b></label>
                <textarea minlength="1" class="form-control" rows="5" id="text"
                          placeholder="Tu nám zanechajte svoj odkaz :)" name="text"
                          required pattern="([A-zÀ-ž]){2,}"> <?php echo $text; ?>  </textarea>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary col-md-12">Odoslať</button>
            </div>
        </div>

    </form>
    <br><br>

</div>


</body>
</html>