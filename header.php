<?php $nadpis = "Detva behá, tak sa pridaj!";
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
session_start();
?>
<nav class="navbar navbar-expand-lg bg-light obrazok">
    <img src="img/logo.png" alt="logo">
    <a class="navbar-brand nadpis-dbtsp" href="http://dbtsp.jecool.net/"><?php echo $nadpis; ?>
    </a>
    <button class="navbar-toggler navbar-light " type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto menu">
            <li class="nav-item <?php if (($url == "http://dbtsp.jecool.net/")) {
                echo "active";
            } ?>">
                <a class="nav-link domov-tlacidlo" href="http://dbtsp.jecool.net/">Domov <span
                            class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if (($url == "http://dbtsp.jecool.net/propozicie.php")) {
                echo "active";
            } ?>">
                <a class="nav-link " href="http://dbtsp.jecool.net/propozicie.php" tabindex="-1" aria-disabled="true">Propozície</a>
            </li>
            <li class="nav-item dropdown <?php if (($url == "http://dbtsp.jecool.net/Vysledky2019.php" || $url == "http://dbtsp.jecool.net/Vysledky2018.php")) {
                echo "active";
            } ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Výsledky
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="http://dbtsp.jecool.net/Vysledky2019.php">Ročník 2019</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="http://dbtsp.jecool.net/Vysledky2018.php">Ročník 2018</a>
                </div>
            </li>
            <li class="nav-item <?php if (($url == "http://dbtsp.jecool.net/PridajSa.php")) {
                echo "active";
            } ?>">
                <a class="nav-link " href="http://dbtsp.jecool.net/PridajSa.php" tabindex="-1" aria-disabled="true">Pridaj
                    sa!</a>
            </li>
            <li class="nav-item <?php if (($url == "http://dbtsp.jecool.net/PovedaliOnas.php")) {
                echo "active";
            } ?>">
                <a class="nav-link" href="http://dbtsp.jecool.net/PovedaliOnas.php" tabindex="-1" aria-disabled="true">Povedali
                    o nás</a>
            </li>
            <li class="nav-item border-left <?php if (($_SESSION["valid"] != 1)) {
                echo "skry";
            } ?>">
                <a class="nav-link <?php if (($url == "http://dbtsp.jecool.net/LogoutAdmin.php")) {
                    echo "active";
                } ?>" href="http://dbtsp.jecool.net/LogoutAdmin.php" tabindex="-1" aria-disabled="true">Odhlásiť sa</a>
            </li>
        </ul>

    </div>
</nav>
