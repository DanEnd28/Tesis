<?php
include("../../Config/config.php");
include("../../Model/conexion.php");
$con = conectar();

$sql1 = "SELECT * FROM producto WHERE Estatus=1 ORDER BY Codigo";
$query1 = mysqli_query($con, $sql1);

$sql2 = "SELECT * FROM producto WHERE Estatus=0 ORDER BY Codigo desc";
$query2 = mysqli_query($con, $sql2);

session_start();

//$Usuario=$_SESSION['Usuario'];
//$Nombre=$_SESSION['Nombre'];
//$Apellido=$_SESSION['Apellido'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Productos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../Imagenes/Empanada.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/estilos.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="../index.php" class="navbar-brand mx-4 mb-3">
                    <img class="tamano d-inline-flex align-items-center" src="../Imagenes/Empanada.png" alt="Emp">
                    <h3 class="text-warning d-inline-flex align-items-center"><i class="fa me-2"></i>Mi Exito</h3>
                </a>
                <div class="d-flex d-inline-flex align-items-center ms-4 mb-4">
                    <div>
                        <h6 class="mb-0 d-inline-flex"><?php echo $Usuario?></h6>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Inicio</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Administrador</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="productos.php" class="dropdown-item">Productos</a>
                            <a href="#" class="dropdown-item">Pedidos</a>
                            <a href="#" class="dropdown-item">Clientes</a>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-warning mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <!--ARRIBA Y A LA DERECHA-->
                <div class="navbar-nav align-items-center ms-auto">
                    <!--NOTIFICACIONES-->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificaciones</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <!--USUARIO-->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex"><?php echo $Nombre . ' ' . $Apellido ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Perfil</a>
                            <a href="#" class="dropdown-item">Configuraci??n</a>
                            <a href="#" class="dropdown-item">Cerrar Sesi??n</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            Warning: Undefined array key "Usuario" in C:\Program Files\Xampp\htdocs\Tesis\Nuevo\Productos\productos.php on line 14

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Productos</h6>
                            <form action="insertar.php" method="POST">
                                <div class="mb-3">
                                    <label for="Codigo" class="form-label">Codigo</label>
                                    <input type="text" class="form-control" id="Codigo" name="Codigo">
                                </div>
                                <div class="mb-3">
                                    <label for="Descripcion" class="form-label">Descripci??n</label>
                                    <input type="text" class="form-control" id="Descripcion" name="Descripcion">
                                </div>
                                <div class="mb-3">
                                    <label for="Precio" class="form-label">Precio</label>
                                    <input type="text" class="form-control" id="Precio" name="Precio">
                                </div>
                                <div class="mb-3">
                                    <label for="Estatus" class="form-label">Estatus</label>
                                    <select class="form-select" id="Estatus" name="Estatus">
                                        <option value=""></option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">A??adir</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-8">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Productos Activos</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-start align-middle table-bordered table-hover mb-0">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Descripci??n</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Estatus</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($query1)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['Codigo'] ?></td>
                                                <td><?php echo $row['Descripcion'] ?></td>
                                                <td><?php echo $row['Precio'] ?></td>
                                                <td><?php if ($row['Estatus'] == 1) {
                                                        echo 'Activo';
                                                    } else {
                                                        echo 'Inactivo';
                                                    } ?></td>
                                                <td><a class="btn btn-sm align-center btn-danger desbtn" href="desactivar.php?id=<?php echo openssl_encrypt($row['Codigo'], AES, KEY) ?>">Desactivar</a></td>
                                                <td><a class="btn btn-sm align-center btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#modificar">Modificar</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Productos Inactivos</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Descripci??n</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($query2)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['Codigo'] ?></td>
                                        <td><?php echo $row['Descripcion'] ?></td>
                                        <td><?php echo $row['Precio'] ?></td>
                                        <td><?php if ($row['Estatus'] == 1) {
                                                echo 'Activo';
                                            } else {
                                                echo 'Inactivo';
                                            } ?></td>
                                        <td><a class="btn btn-sm align-center btn-success actbtn" href="activar.php?id=<?php echo openssl_encrypt($row['Codigo'], AES, KEY) ?>">Activar</a></td>
                                        <td><a class="btn btn-sm align-center btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#modificar">Modificar</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Blank End -->

            <!-- Modal -->
            <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="modificarlabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modificarlabel">Modificar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="modificar.php" method="POST">
                                <div class="mb-3">
                                    <label for="Codigo" class="form-label">Codigo</label>
                                    <input type="text" class="form-control" id="CodigoM" name="CodigoM">
                                </div>
                                <div class="mb-3">
                                    <label for="Descripcion" class="form-label">Descripci??n</label>
                                    <input type="text" class="form-control" id="DescripcionM" name="DescripcionM">
                                </div>
                                <div class="mb-3">
                                    <label for="Precio" class="form-label">Precio</label>
                                    <input type="text" class="form-control" id="PrecioM" name="PrecioM">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Luncheria Mi Exito</a>, Todos los derechos reservados.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Dise??ando por Danny Endara y Jhonatan Ferrer.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-warning btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="../../Librerias/jquery-3.4.1.min.js"></script>
    <script src="../../Librerias/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>

    <!--Sweet Alert-->
    <script src="../../Librerias/sweetalert2.js"></script>

    <!--Eventos-->

    <script>
        $('.editbtn').on('click', function() {
            $tr = $(this).closest('tr');
            var datos = $tr.children("td").map(function() {
                return $(this).text();
            });
            $('#CodigoM').val(datos[0]);
            $('#DescripcionM').val(datos[1]);
            $('#PrecioM').val(datos[2]);
        });
        $('.desbtn').on('click', function() {
            Swal.fire({
                position: 'center',
                title: 'Desactivado',
                showConfirmButton: false,
                timer: 1500
            })
        });
        $('.actbtn').on('click', function() {
            Swal.fire({
                position: 'center',
                title: 'Activado',
                showConfirmButton: false,
                timer: 1500
            })
        });
    </script>

</body>

</html>