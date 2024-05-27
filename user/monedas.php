<?php
include 'session.php';
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/swiper-icons.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/Data-Table-styles.css">
    <link rel="stylesheet" href="../assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/css/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="../assets/css/Navbar.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="../assets/css/Steps-Progressbar.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light" style="background: rgb(52,131,225);">
        <div class="container-fluid"><a href="index.html"><img class="img-fluid" src="../assets/img/logos/LOGO%20SONQOLLAY%20CORREGIDO.png" width="171" height="29"></a>
            <ul class="navbar-nav flex-nowrap ms-auto">
                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                    <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="me-auto navbar-search w-100">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                    </div>
                </li>
                
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Valerie Luna</span><img class="border rounded-circle img-profile" src="../assets/img/avatars/avatar1.jpeg"></a>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="perfil.html"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a><a class="dropdown-item" href="change-password.html"><i class="fas fa-user-lock fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Cambiar contraseña</a><a class="dropdown-item" href="modulosA.html"><i class="fas fa-check-double fa-sm fa-fw me-2 text-gray-400"></i>Mis módulos&nbsp; aprobados</a><a class="dropdown-item" href="modulos.html"><i class="fas fa-pencil-alt fa-sm fa-fw me-2 text-gray-400"></i>Mis módulos&nbsp; por llevar</a><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Salir</a></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4" style="text-align: center;"></h3>
                </div>
                <section class="clean-block features">
                    <div class="container py-4 py-xl-5" style="display: block;">
                        <section style="padding-top: 40px;">
                            <div class="container" style="text-align: center;">
                                <h1>Adquiere tus monedas</h1>
                            </div>
                            <div class="row justify-content-center" style="margin-right: 0px;margin-left: 0px;">
                                <div class="col-sm-6 col-lg-4" style="margin-top: 35px;">
                                    <div class="card clean-card text-center"><img class="img-fluid card-img-top w-100 d-block" src="../assets/img/monedas/moneda-de-dolar.png">
                                        <div class="card-body info">
                                            <h4 class="card-title">10 monedas</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4" style="margin-top: 35px;">
                                    <div class="card clean-card text-center"><img class="img-fluid card-img-top w-100 d-block" src="../assets/img/monedas/pila-de-monedas.png">
                                        <div class="card-body info">
                                            <h4 class="card-title">40 monedas</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4" style="margin-top: 35px;">
                                    <div class="card clean-card text-center"><img class="img-fluid card-img-top w-100 d-block" src="../assets/img/monedas/oro.png">
                                        <div class="card-body info">
                                            <h4 class="card-title">120 monedas</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section style="padding-top: 40px;">
                            <div class="row justify-content-center" style="margin-right: 0px;margin-left: 0px;">
                                <div class="col-sm-6 col-lg-4" style="margin-top: 35px;">
                                    <div class="card clean-card text-center"><img class="img-fluid card-img-top w-100 d-block" src="../assets/img/monedas/bolsa-de-dinero.png">
                                        <div class="card-body info">
                                            <h4 class="card-title">240 monedas</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4" style="margin-top: 35px;">
                                    <div class="card clean-card text-center"><img class="img-fluid card-img-top w-100 d-block" src="../assets/img/monedas/ahorros.png">
                                        <div class="card-body info">
                                            <h4 class="card-title">400 monedas</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2023</span></div>
        </div>
    </footer>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="../assets/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---1-Index-Table-with-Search--Sort-Filters.js"></script>
    <script src="../assets/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---Material-UI-Actions.js"></script>
    <script src="../assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="../assets/js/Simple-Slider.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>