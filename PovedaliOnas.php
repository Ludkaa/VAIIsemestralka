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

            $("#form").submit(function (event) {

                event.preventDefault();

                let $form = $(this);

                let $inputs = $form.find("input, select, button, textarea");

                let data = JSON.stringify(getFormData($form));

                $inputs.prop("disabled", true);

                $.ajax({
                    url: "https://dbtspapi.herokuapp.com/referencia",
                    type: "post",
                    data: data,
                    dataType: "json",
                    success: function (msg) {
                        window.location.href = "/FormSentRef.php";
                    },
                    error: function (e) {
                        $inputs.prop("disabled", false);
                        console.log(e);
                    }
                });
            });

        });
    </script>
    <link rel="stylesheet" href="1.css">
    <link rel="icon" type="image/png" src="img/logo.png">


</head>
<body class="telo">

<?php
include 'header.php';
if ((!empty($_SESSION['valid']))) {
    $_SESSION['valid'] = 1;
} else {
    $_SESSION['valid'] = 0;
}
?>

<div class="col-lg-8 text">
    <div class="col-lg-10 text">
        <div class="text-center">
            <br>
            <h2 class="nadpis"><strong> Povedali o nás: </strong></h2>
            <br>
        </div>


        <?php
        $url = "https://dbtspapi.herokuapp.com/referencie";
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $Data = json_decode($response);

        for ($i = 0; $i < sizeof($Data->data); $i++) {
            ?>
            <div class="card forum">
                <div class="card-body ">
                    <h5 class="card-title "><strong><?php echo $Data->data[$i]->meno ?></strong></h5>
                    <hr class="featurette-divider ">
                    <p class="card-text"><?php echo $Data->data[$i]->text ?></p>
                </div>


                <a href="http://dbtsp.jecool.net/EditRef.php?id=<?php echo $Data->data[$i]->id ?>"
                   id="edit<?php echo $i ?>" type="button"
                   class="btn btn-info forumTlacitka <?php if (($_SESSION["valid"] != 1)) {
                       echo "skry";
                   } ?>">Editovať</a>

                <button type="button" id="delete<?php echo $i ?>"
                        class="btn btn-secondary forumTlacitka <?php if (($_SESSION["valid"] != 1)) {
                            echo "skry";
                        } ?>">Vymazať
                </button>
            </div>

            <script>
                $("#delete" + <?php echo $i ?>).click(function (event) {
                    let del_id = "<?php echo $Data->data[$i]->id ?>";
                    $.ajax({
                        type: 'DELETE',
                        url: "https://dbtspapi.herokuapp.com/referencia/" + del_id,
                        success: function (msg) {
                            alert("Bežec bol odstránený");
                            location.reload();
                        },
                        error: function (e) {
                            $inputs.prop("disabled", false);
                            console.log(e);
                            alert("Nastala chyba");
                        }
                    })
                })
            </script>

        <?php }
        ?>

        <hr class="featurette-divider ">
        <div class="text-center">
            <br>
            <h2 class="nadpis"><strong> Zanechajte nám odkaz! </strong></h2>
            <br>
        </div>

        <form id="form">
            <div class="form-row col-lg-10 stred">
                <div class="form-group col-lg-6">
                    <label><b>Meno</b></label>
                    <input type="text" class="form-control" placeholder="Meno " name="meno" required>
                </div>
                <div class="form-group col-lg-6">
                    <label for="inputEmail4"><b>Email</b></label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
                </div>
                <div class="form-group col-lg-12">
                    <label><b>Text</b></label>
                    <textarea type="text" class="form-control" rows="5" id="text"
                              placeholder="Tu nám zanechajte svoj odkaz :)" name="text" required></textarea>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary col-md-12">Odoslať</button>
                </div>
            </div>

        </form>


    </div>


    <?php
    include 'footer.php'
    ?>


</body>
</html>

