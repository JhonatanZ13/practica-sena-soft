<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/datatables.min.css"/>
    <title>SENASOFT</title>
</head>

<body>
    <div id="app">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Hackathon SIIGO 2020</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="">Inicio</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 d-flex justify-content-between align-items-center" href="<?= getUrl("Facturacion","Facturacion","getFacturacion") ?>">
                        Facturacion <span class="badge bg-danger rounded-pill">{{datos.cantidad}}</span>
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= getUrl("Facturacion","Facturacion","prueba") ?>">Prueba</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= getUrl("Inventario","Inventario","getInventario") ?>">Inventario</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= getUrl("EntradaBodega","EntradaBodega","consultar");?>">Entrada Bodega</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="">Salida Bodega</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-outline-dark" id="sidebarToggle"><i class="fas fa-chevron-left" id="toogleButton"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item"><span class="nav-link">Administrador</span></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jhonatan Zambrano</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Configuracion</a>
                                        <a class="dropdown-item" href="#!">Cerrar sesion</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">