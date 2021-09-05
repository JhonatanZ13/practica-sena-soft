<?php

    include_once '../lib/helpers.php';
    include_once '../view/partials/header.php';
    
    echo "<body>";
        include_once '../view/facturas/prueba_factura.php';
        if (isset($_GET['modulo'])) {
            resolve();
        }
    echo "</body>";

    include_once '../view/partials/scripts.php';
    include_once '../view/partials/scripts.php';
