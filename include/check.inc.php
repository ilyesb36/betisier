<?php
if (empty($_SERVER["HTTP_REFERER"])) {
    echo "<br> <br> Vous ne pouvez pas changer la page avec l'url";
    exit;
}
?>