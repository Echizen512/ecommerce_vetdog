
<?php
     session_start();
    
    if(!isset($_SESSION['cargo']) == 2){
    header('location: ../tiendaonline');

    $id_due=$_SESSION['id_due'];
  }
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Vetdog - Tienda de productos para tu mascota</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="../../assets/img/ico.png" type="image/x-icon" />

    <!-- Google fonts include -->
    <link href="../../../fonts.googleapis.com/css467e.css?family=Muli:300,400,400i,600,700,800%7CWork+Sans:300,400,500,600,700,800" rel="stylesheet">

    <!-- All Vendor & plugins CSS include -->
    <link href="../../assets/css/vendor.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- Start Header Area -->
    <header class="header-area">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="welcome-message">
                                <p>Bienvenidos a nuestra nueva web</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center">
                                    <li class="account-settings">
                                       <?php echo ucfirst($_SESSION['correo']); ?>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list account-list">
                                           
                                            <li><a href="my-account">mi cuenta</a></li>
                                            <li><a href="../sales/sales.php">Ventas</a></li>
                                            <li><a href="salir">cerrar sesion</li>

                                              

                                            
                                        </ul>
                                    </li>
                                 

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-middle-area">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- start logo area -->
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="shop">
                                    <img src="../../assets/img/logo/image(1).png" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- start search box area -->
                        <div class="col-lg-6">
                            <div class="search-box-wrapper">
                                <div class="search-box-inner-wrap">
                                    <form class="search-box-inner">
                                        <div class="search-field-wrap">
                                            <input type="text" class="search-field" placeholder="Más de 50.000 productos ¡encuéntralos aquí!">
                                        </div>
                                        
                                        <div class="search-select-box">
                                            
                                        </div>

                                        <div class="search-btn">
                                            <button><i class="ion-ios-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- start search box end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-3 ml-auto">
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li>
                                        <a href="#">
                                            <i class="ion-android-favorite-outline"></i>
                                            <span class="notification">0</span>
                                        </a>
                                    </li>
                                    <li class="mini-cart-wrap">
                                        <a href="cart">
                                            <i class="ion-bag"></i>
                                            <span class="notification"><?php 
                            echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                        ?></span>
                                        </a>
                                        

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- mini cart area end -->
                    </div>
                </div>
            </div>
            <!-- header middle area end -->

            <!-- main menu area start -->
            <div class="main-menu-area theme-color-2 sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="category-toggle-wrap">
                                <div class="category-toggle">
                                    <i class="ion-android-menu"></i>
                                    Categorías
                                    <span><i class="ion-android-arrow-dropdown"></i></span>
                                </div>

                                <nav class="category-menu">
                                    <ul class="categories-list">
                               <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT * FROM category';
                foreach ($db->query($sql) as $row) {
                    ?>   

                    <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                    <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>               
                                    </ul>
                                </nav>

                            </div>
                        </div>

                         <div class="col-lg-7">
                            <div class="main-menu home-main">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        
                                        <li>
                                            <a href="#">perros <i class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title"><a href="#">Alimentos perros</a>
                                                    <ul>
             <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                                               
                                                        <li>
                                                            <a href="#"><?php echo $row['nomcate']; ?></a>
                                                        </li>

                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                                        
                                                    </ul>
                                                </li>

                                                <li class="mega-title"><a href="#">Cuidado e higiene</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Farmacia</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Accesorios</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>

                                            </ul>
                                        </li>

                                        
                                        <li>
                                            <a href="#">gatos <i class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title"><a href="#">Alimentos gatos</a>
                                                    <ul>
             <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                                               
                                                        <li>
                                                            <a href="#"><?php echo $row['nomcate']; ?></a>
                                                        </li>

                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                                        
                                                    </ul>
                                                </li>

                                                <li class="mega-title"><a href="#">Cuidado e higiene</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Farmacia</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Accesorios</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>

                                            </ul>
                                        </li>


                                       
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="contact-top">
                                <div class="contact-top-icon">
                                    <img src="../../assets/img/icon/download.png" alt="">
                                </div>
                                <div class="contact-top-info">
                                    <p>Llámanos ahora</p>
                                    <a href="#">+51 999999999</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- main menu area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-header-top">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center justify-content-center">
                                    <li class="account-settings">
                                        <?php echo ucfirst($_SESSION['correo']); ?>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list account-list">
                                           
                                          
                                            <li><a href="my-account">mi cuenta</a></li>
                                            <li><a href="../sales/sales.php">Ventas</a></li>
                                            <li><a href="salir">cerrar sesion</li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="shop">
                                    <img src="../../assets/img/logo/image(1).png" alt="Vetdog Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="cart">
                                        <i class="ion-bag"></i>
                                        <span class="notification"><?php 
                            echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                        ?></span>
                                    </a>
                                </div>
                                <div class="mobile-menu-btn">
                                    <div class="off-canvas-btn">
                                        <i class="ion-android-menu"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="category-toggle-wrap">
                            <div class="category-toggle">
                                <i class="ion-android-menu"></i>
                                Categorías
                                <span><i class="ion-android-arrow-dropdown"></i></span>
                            </div>
                            
                           <nav class="category-menu">
                                <ul class="categories-list">
  <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT * FROM category';
                foreach ($db->query($sql) as $row) {
                    ?>                                 
                                    <li><a href="#"><?php echo $row['nomcate']; ?></a></li>

   <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                  
                                    
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
    </header>
    <!-- end Header Area -->

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Más de 50.000 productos ¡encuéntralos aquí!">
                        <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                           
                            <li class="menu-item-has-children"><a href="#">perros</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title has-children"><a href="#">Alimentos perros</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li>
                                                <a href="#"><?php echo $row['nomcate']; ?></a>
                                            </li>
<?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Cuidado e higiene</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>    

                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?> 
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Farmacia</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>

                                             <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Accesorios</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?> 
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                     <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                        
                                        </ul>
                                    </li>
                                </ul>
                            </li>


                            <li class="menu-item-has-children"><a href="#">gatos</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title has-children"><a href="#">Alimentos gatos</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li>
                                                <a href="#"><?php echo $row['nomcate']; ?></a>
                                            </li>
<?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Cuidado e higiene</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>    

                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?> 
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Farmacia</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>

                                             <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Accesorios</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?> 
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                     <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                        
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            

                            
                           
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">+51 999999999</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">vetdogg@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        
                    </div>
                </div>

                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->



    <!-- main wrapper start -->
    <main>
        <!-- hero slider area start -->
        <div class="hero-slider-wrapper mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slider-active slick-dot-style">
                            <!-- slider item start -->
                            <div class="hero-item-inner">
                                <div class="hero-slider-item d-flex align-items-center bg-img" data-bg="../../assets/img/slider/slider1.png">
                                    <div class="hero-slider-content">
                                        <h1>Bolsa llena de <br> Productos</h1>
                                            <h4>Hasta 10% en <br> Comida para cachorro y adulto</h4>
                                                
                                    </div>
                                </div>
                            </div>
                            <!-- slider item start -->

                            <!-- slider item start -->
                            <div class="hero-item-inner">
                                <div class="hero-slider-item d-flex align-items-center bg-img" data-bg="../../assets/img/slider/fondobolsa1.png">
                                    <div class="hero-slider-content">
                                        <h1>Promocion Navideña</h1>
                                            <h4>Hasta 10% en <br> En todos los productos Rikokan</h4>
                                               
                                    </div>
                                </div>
                            </div>
                            <!-- slider item start -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero slider area end -->

        <!-- banner feature area start -->
        <div class="banner-feature pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner-feature-wrapper">
                            <!-- feature single item start -->
                            <div class="banner-feature-item">
                                <div class="banner-feature-icon">
                                    <img src="../../assets/img/icon/icon1.png" alt="">
                                </div>
                                <div class="banner-feature-post">
                                    <h6>Entrega rapida</h6>
                                    <p>Envío gratis en todos los pedidos superiores a $ 200.</p>
                                </div>
                            </div>
                            <!-- feature single item end -->

                            <!-- feature single item start -->
                            <div class="banner-feature-item">
                                <div class="banner-feature-icon">
                                    <img src="../../assets/img/icon/icon2.png" alt="">
                                </div>
                                <div class="banner-feature-post">
                                    <h6>Soporte 24/7</h6>
                                    <p>Contáctenos las 24 horas del día, los 7 días de la semana.</p>
                                </div>
                            </div>
                            <!-- feature single item end -->

                            <!-- feature single item start -->
                            <div class="banner-feature-item">
                                <div class="banner-feature-icon">
                                    <img src="../../assets/img/icon/icon3.png" alt="">
                                </div>
                                <div class="banner-feature-post">
                                    <h6>Devoluciones de 60 días</h6>
                                    <p>Si no te encanta, tienes 60 días para devolverlo.</p>
                                </div>
                            </div>
                            <!-- feature single item end -->

                            <!-- feature single item start -->
                            <div class="banner-feature-item">
                                <div class="banner-feature-icon">
                                    <img src="../../assets/img/icon/icon4.png" alt="">
                                </div>
                                <div class="banner-feature-post">
                                    <h6>Pago 100% seguro</h6>
                                    <p>Garantizamos un pago seguro.</p>
                                </div>
                            </div>
                            <!-- feature single item end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner feature area end -->

        <!-- feature categories area start -->
        <div class="feature-categories-area pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <!-- new product item start -->
<!---------------------------- ACA COMIENZA NUEVOS PRODUCTOS ------------------------------------------------->         
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single-item">
                            <div class="feature-product-title">
                                <h3>nuevos productos</h3>
                            </div>
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-new", "nextArrow": ".next-new", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                    <!-- single item start -->
                        <!-- ---------POR ACA PONDRE EL CODI ------------------------------>
        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod DESC  LIMIT 5';
                foreach ($db->query($sql) as $row) {
                    ?> 

                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="../../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Añadir al carrito"><i class="ion-bag"></i></a>
                    <!-- COMIENZA EL MODAL ----------------->     
<a href="details?id=<?php echo $row['id_prod']; ?>"  ><span data-bs-toggle="tooltip" title="Vista rápida"><i class="ion-ios-eye-outline"></i></span></a>



                    <!-- TERMINA EL MODAL ------------------>    

                                            </div>
                                        </div>

                                       
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="price-box">
                                                   
                                                    <span class="price-regular">S/<?php echo $row['precV']; ?></span>
                                                </div>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>new</span>
                                                    </div>
                                                    <div class="product-label discount">
                                                        <span>-5%</span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                </div>
                                                <div class="product-name">
                                                    <h5><a href="#"><?php echo $row['nompro']; ?></a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
<!-- POR ACA TERMINA EL CODI ---------------------------------------------------------->


                                    <!-- single item end -->
                                </div>
                                <!-- Start Slider Navigation -->
                                <div class="ht-slick-nav">
                                    <button class="prev-new"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-new right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                                <!-- End Slider Navigation -->
                            </div>

                           

                        </div>
                    </div>
    <!---------------------------- ACA TERMINA NUEVOS PRODUCTOS ------------------------------------------------->

<!------------------------- ACA COMIENZA  PRODUCTOS  DESTACADOS---------------------------------------------->
     <div class="col-lg-3 col-md-6">
                        <div class="feature-single-item">
                            <div class="feature-product-title">
                                <h3>destacados</h3>
                            </div>
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-feat", "nextArrow": ".next-feat", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                    <!-- single item start -->
                        <!-- ---------POR ACA PONDRE EL CODI ------------------------------>
        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod ASC  LIMIT 5';
                foreach ($db->query($sql) as $row) {
                    ?> 

                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="../../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Añadir al carrito"><i class="ion-bag"></i></a>
                <!-- COMIENZA EL MODAL -------------------------->     
                    <a href="details?id=<?php echo $row['id_prod']; ?>"><span data-bs-toggle="tooltip" title="Vista rápida"><i class="ion-ios-eye-outline"></i></span></a>


                <!-- TERMINA EL MODAL -------------------------->    

                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="price-box">
                                                   
                                                    <span class="price-regular">S/<?php echo $row['precV']; ?></span>
                                                </div>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>new</span>
                                                    </div>
                                                    <div class="product-label discount">
                                                        <span>-5%</span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                </div>
                                                <div class="product-name">
                                                    <h5><a href="#"><?php echo $row['nompro']; ?></a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                    <!-- POR ACA TERMINA EL CODI -->


                                    <!-- single item end -->
                                </div>
                                <!-- Start Slider Navigation -->
                                <div class="ht-slick-nav">
                                    <button class="prev-feat"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-feat right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                                <!-- End Slider Navigation -->
                            </div>

                           

                        </div>
                    </div>
     <!--------------------- ACA TERMINA  PRODUCTOS  DESTACADOS---------------------------------------------->



     <!------------------------- ACA COMIENZA  PRODUCTOS  VENDIDOS---------------------------------------------->
     <div class="col-lg-3 col-md-6">
                        <div class="feature-single-item">
                            <div class="feature-product-title">
                                <h3>vendidos</h3>
                            </div>
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-best", "nextArrow": ".next-best", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                    <!-- single item start -->
                        <!-- ---------POR ACA PONDRE EL CODI ------------------------------>
        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod DESC  LIMIT 5';
                foreach ($db->query($sql) as $row) {
                    ?> 

                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="../../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Añadir al carrito"><i class="ion-bag"></i></a>
                                           <!-- COMIENZA EL MODAL -->     
                                                <a href="details?id=<?php echo $row['id_prod']; ?>" ><span data-bs-toggle="tooltip" title="Vista rápida"><i class="ion-ios-eye-outline"></i></span></a>
                                            <!-- TERMINA EL MODAL -->    

                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="price-box">
                                                   
                                                    <span class="price-regular">S/<?php echo $row['precV']; ?></span>
                                                </div>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>new</span>
                                                    </div>
                                                    <div class="product-label discount">
                                                        <span>-5%</span>
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                </div>
                                                <div class="product-name">
                                                    <h5><a href="#"><?php echo $row['nompro']; ?></a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                    <!-- POR ACA TERMINA EL CODI -->


                                    <!-- single item end -->
                                </div>
                                <!-- Start Slider Navigation -->
                                <div class="ht-slick-nav">
                                    <button class="prev-best"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-best right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                                <!-- End Slider Navigation -->
                            </div>

                           

                        </div>
                    </div>
     <!------------------------- ACA TERMINA  PRODUCTOS  VENDIDOS---------------------------------------------->

                   

                    <!-- banner statistics start -->
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-statistics-wrapper">
                            <div class="banner-statistics">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="../../../vetdog/assets/img/subidas/crockes.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="banner-statistics">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="../../../vetdog/assets/img/subidas/cxxx.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- banner statistics end -->
                </div>
            </div>
        </div>


        <!-- feature categories area start -->
        <div class="categories-features-area pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="categories-feature-title-inner">
                            <!-- section title start -->
                            <div class="section-title">
                                <h2>perros y gatos</h2>
                            </div>
                            <!-- section title end -->

                            <!-- product tab menu start -->
                            <div class="feature-tab-menu">
                                <ul class="nav justify-content-start justify-content-lg-end">
                                    <li><a data-bs-toggle="tab" class="active" href="#one">todos</a></li>
                                   
                                </ul>
                            </div>
                            <!-- product tab menu start -->
                        </div>


                        <!-- product tab content start -->
                        <div class="tab-content">
                            <!-- product tab start -->
                            <div class="tab-pane fade active show" id="one">
                                <!-- categories features start -->
                                <div class="categories-features-wrapper">
                                    <div class="ht-slick-slider-wrap">
                                        <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "speed": 1000, "arrows": true, "prevArrow": ".prev-meat", "nextArrow": ".next-meat", "responsive":[{"breakpoint":992, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                            <!-- single item start -->
                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod DESC ';
                foreach ($db->query($sql) as $row) {
                    ?>     
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <a href="#">
                                                        <img src="../../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>" alt="">
                                                    </a>
                                                    <div class="add-to-links">
                                                        <a href="#" data-bs-toggle="tooltip" title="Add to Cart"><i class="ion-bag"></i></a>
                                                        
                                                        <a href="details?id=<?php echo $row['id_prod']; ?>" ><span data-bs-toggle="tooltip" title="Quick View"><i class="ion-ios-eye-outline"></i></span></a>

                                                       
                                                    </div>
                                                    <div class="product-badge product-badge__2">
                                                        <div class="product-label new">
                                                            <span>new</span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="product-content">
                                                    <div class="product-content">
                                                        <div class="product-name">
                                                            <h5><a href="#"><?php echo $row['nompro']; ?></a></h5>
                                                        </div>
                                                        <div class="ratings">
                                                            <span><i class="ion-android-star"></i></span>
                                                            <span><i class="ion-android-star"></i></span>
                                                            <span><i class="ion-android-star"></i></span>
                                                            <span><i class="ion-android-star"></i></span>
                                                            <span><i class="ion-android-star"></i></span>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="price-old"><del></del></span>
                                                            <span class="price-regular">S/<?php echo $row['precV']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                           <!-- ACA TERMINA -->
                                            <!-- single item end -->
                                        </div>
                                        <!-- Start Slider Navigation -->
                                        <div class="ht-slick-nav">
                                            <button class="prev-meat"><i class="ion-ios-arrow-left"></i></button>
                                            <button class="next-meat right"><i class="ion-ios-arrow-right"></i></button>
                                        </div>
                                        <!-- End Slider Navigation -->
                                    </div>
                                </div>
                                <!-- categories features end -->
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="categories-area pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section header wrapper start -->
                        <div class="section-header-wrap">
                            <!-- section title start -->
                            <div class="section-title">
                                <h2>nuestras categorias</h2>
                            </div>
                            <!-- section title end -->

                            <!-- Start Slider Navigation -->
                            <div class="ht-slick-nav slick-append">
                                <button class="prev-recom"><i class="ion-ios-arrow-left"></i></button>
                                <button class="next-recom right"><i class="ion-ios-arrow-right"></i></button>
                            </div>
                            <!-- End Slider Navigation -->
                        </div>
                        <!-- section header wrapper end -->

                        <!-- categories wrapper start -->
                        <div class="categories-item-wrapper pt-30">
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "rows": 2, "speed": 1000, "prevArrow": ".prev-recom", "nextArrow": ".next-recom", "responsive":[{"breakpoint":992, "settings":{"slidesToShow": 3}}, {"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1, "rows": 1}}]}'>
                                    <!-- categories item start -->
     <!-- START -->     

     <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT * FROM category';
                foreach ($db->query($sql) as $row) {
                    ?>     

                                    <div class="categories-item">
                                        
                                        <div class="categories-content">
                                            <h5><a href="category?id=<?php echo $row['id_cate']; ?>"><?php echo $row['nomcate']; ?></a></h5>
                                        
                                        </div>
                                    </div>
      <!-- END -->    
      <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                           
                                </div>
                            </div>
                        </div>
                        <!-- categories wrapper end -->
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    

    <!--== Start Footer Area Wrapper ==-->
    <footer class="footer-wrapper">

        <!-- newsletter area start -->
        <div class="newsletter-area theme-color-2 pt-36 pb-36">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="newsletter-title">
                            <h3>suscríbete al boletín</h3>
                            <p>Regístrese ahora para recibir actualizaciones sobre promociones y cupones.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="newsletter-inner">
                            <form id="mc-form">
                                <input type="email" class="news-field" id="mc-email" autocomplete="off" placeholder="Enter your email address">
                                <button class="news-btn" id="mc-submit">subscribe</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter area end -->

        <!-- footer main widget area -->
        <div class="footer-widget-area bg-gray">
            <div class="container">
                <div class="row">
                    <!-- footer widget item start -->
                    <div class="col-lg-6 col-md-6">
                        <div class="fotter-widget-item">
                            <div class="footer-widget-title">
                                <div class="footer-logo">
                                    <a href="shop">
                                        <img src="../../assets/img/logo/image(1).png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="support-widget-body">
                                <div class="support-inner">
                                    <div class="support-icon">
                                        <img src="../../assets/img/icon/support.png" alt="">
                                    </div>
                                    <div class="support-info">
                                        <h6>Llámenos al número gratuito</h6>
                                        <p>(+51)992998222 or (+51)992998222</p>
                                    </div>
                                </div>
                                <div class="footer-contact-info">
                                    <h6>Datos de contacto:</h6>
                                    <p>169-C, Technohud, Piura, PERÚ</p>
                                </div>
                                <div class="footer-contact-info footer-email">
                                    <h6>Datos de contacto:</h6>
                                    <p><a href="#">vetdogg@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer widget item end -->

                    <!-- footer widget item start -->
                    <div class="col-lg-3 col-md-3">
                        <div class="fotter-widget-item">
                            <div class="footer-widget-title">
                                <h4>Conócenos </h4>
                            </div>
                            <div class="support-widget-body">
                                <div class="usefull-links">
                                    <ul>
                                        <li><a href="#">Ventajas de vetdog</a></li>
                                      
                                        <li><a href="#">Opiniones sobre vetdog</a></li>
                                        <li><a href="#">Preguntas frecuentes</a></li>
                                        <li><a href="#">Vende en nuestro Markeplace</a></li>
                                        <li><a href="#">Blog</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer widget item end -->

                    <!-- footer widget item start -->
                    <div class="col-lg-3 col-md-3">
                        <div class="fotter-widget-item">
                            <div class="footer-widget-title">
                                <h4>Compras</h4>
                            </div>
                            <div class="support-widget-body">
                                <div class="usefull-links">
                                    <ul>
                                        <li><a href="#">Ofertas del mes</a></li>
                                        <li><a href="#">Condiciones de envio</a></li>
                                        <li><a href="#">Top marcas</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer widget item end -->
                </div>
            </div>
        </div>
        <!-- footer main widget end -->

        <!-- footer middle area start -->
        <div class="footer-middle-area bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 m-auto">
                        <div class="footer-banner-inner">
                            <!-- start single item -->
                            <div class="footer-banner-item-inner">
                                <div class="footer-banner-item">
                                    <div class="f-banner-icon">
                                        <img src="../../assets/img/icon/f-icon1.png" alt="">
                                    </div>
                                    <p class="f-banner-text">Más de 500.000 productos</p>
                                </div>
                            </div>
                            <!-- end single item -->

                            <!-- start single item -->
                            <div class="footer-banner-item-inner">
                                <div class="footer-banner-item">
                                    <div class="f-banner-icon">
                                        <img src="../../assets/img/icon/f-icon2.png" alt="">
                                    </div>
                                    <p class="f-banner-text">Mejores Precios</p>
                                </div>
                            </div>
                            <!-- end single item -->

                            <!-- start single item -->
                            <div class="footer-banner-item-inner">
                                <div class="footer-banner-item">
                                    <div class="f-banner-icon">
                                        <img src="../../assets/img/icon/f-icon3.png" alt="">
                                    </div>
                                    <p class="f-banner-text">Servicio de atención al cliente profesional</p>
                                </div>
                            </div>
                            <!-- end single item -->

                            <!-- start single item -->
                            <div class="footer-banner-item-inner">
                                <div class="footer-banner-item">
                                    <div class="f-banner-icon">
                                        <img src="../../assets/img/icon/f-icon4.png" alt="">
                                    </div>
                                    <p class="f-banner-text">Envío gratis o de bajo costo</p>
                                </div>
                            </div>
                            <!-- end single item -->
                        </div>
                    </div>
                    
                    

                </div>
            </div>
        </div>
        <!-- footer middle area end -->

        <!-- footer bottom area start -->
        <div class="footer-bottom-area bg-white">
            <div class="copyright-text">
                <p>&copy; 2021 <b>Vetdog</p>
            </div>
        </div>
        <!-- footer bottom area end -->

    </footer>
    <!--== End Footer Area Wrapper ==-->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->
    <script src="../../assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="../../assets/js/active.js"></script>


</body>

</html>