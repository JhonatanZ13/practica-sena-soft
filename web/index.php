<?php

    include_once '../lib/helpers.php';
    include_once '../view/partials/header.php';
    
        if (isset($_GET['modulo'])) {
            resolve();
        }

    include_once '../view/partials/footer.php';
    include_once '../view/partials/scripts.php';
