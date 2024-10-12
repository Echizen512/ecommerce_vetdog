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
    <style type="text/css">
        .card{
width: 320px;
height: 190px;
  -webkit-perspective: 600px;
  -moz-perspective: 600px;
  perspective:600px;
  
}

.card__part{
  box-shadow: 1px 1px #aaa3a3;
    top: 0;
  position: absolute;
z-index: 1000;
  left: 0;
  display: inline-block;
    width: 320px;
    height: 190px;
    background-image: url('https://image.ibb.co/bVnMrc/g3095.png'), linear-gradient(to right bottom, #fd696b, #fa616e, #f65871, #f15075, #ec4879); /*linear-gradient(to right bottom, #fd8369, #fc7870, #f96e78, #f56581, #ee5d8a)*/
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    border-radius: 8px;
   
    -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
}

.card__front{
  padding: 18px;
-webkit-transform: rotateY(0);
-moz-transform: rotateY(0);
}

.card__back {
  padding: 18px 0;
-webkit-transform: rotateY(-180deg);
-moz-transform: rotateY(-180deg);
}

.card__black-line {
    margin-top: 5px;
    height: 38px;
    background-color: #303030;
}

.card__logo {
    height: 16px;
}

.card__front-logo{
      position: absolute;
    top: 18px;
    right: 18px;
}
.card__square {
    border-radius: 5px;
    height: 30px;
}

.card_numer {
    display: block;
    width: 100%;
    word-spacing: 4px;
    font-size: 20px;
    letter-spacing: 2px;
    color: #fff;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 20px;
}

.card__space-75 {
    width: 75%;
    float: left;
}

.card__space-25 {
    width: 25%;
    float: left;
}

.card__label {
    font-size: 10px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.8);
    letter-spacing: 1px;
}

.card__info {
    margin-bottom: 0;
    margin-top: 5px;
    font-size: 16px;
    line-height: 18px;
    color: #fff;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.card__back-content {
    padding: 15px 15px 0;
}
.card__secret--last {
    color: #303030;
    text-align: right;
    margin: 0;
    font-size: 14px;
}

.card__secret {
    padding: 5px 12px;
    background-color: #fff;
    position:relative;
}

.card__secret:before{
  content:'';
  position: absolute;
top: -3px;
left: -3px;
height: calc(100% + 6px);
width: calc(100% - 42px);
border-radius: 4px;
  background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);
}

.card__back-logo {
    position: absolute;
    bottom: 15px;
    right: 15px;
}

.card__back-square {
    position: absolute;
    bottom: 15px;
    left: 15px;
}

.card:hover .card__front {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);

}

.card:hover .card__back {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
}
    </style>
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
                                <p>Bienvenidos</p>
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
                                    all categories
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
                                    <a href="#">0412-4773077</a>
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
                                all categories
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
                                <a href="#">0412-4773077</a>
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
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="shop">Home</a></li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">mi cuenta</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<!-- POR ACA EMPIEZA--------------------------------------------------------------------------->

<div class="my-account-wrapper pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                            Dashboard</a>
                                        <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                            Pedidos</a>
                                        
                                        <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i>
                                            Método de pago</a>
                                        <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                            envios</a>
                                        <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> detalles de la cuenta</a>
                                        
                                        

                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>
                                                <div class="welcome">
                                                    <p>Hola, <strong><?php echo ucfirst($_SESSION['nom_due']); ?></strong></p>
                                                </div>
                                                <p class="mb-0">Desde el panel de su cuenta. puede verificar y ver fácilmente sus pedidos recientes, administrar sus direcciones de envío y facturación y editar su contraseña y los detalles de su cuenta.</p>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Pedidos</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "vetdog";
$id_due=$_SESSION['id_due'];
try{
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
     $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

$sentencia = $base_de_datos->query("SELECT  venta.fecha, venta.id_venta,venta.estado, venta.total,venta.tipoc, venta.tipopa, owner.id_due, owner.dni_due, owner.nom_due, owner.ape_due, owner.fecnaci, owner.movil, owner.fijo, owner.correo, owner.direc,venta.numtarj, venta.typetarj, venta.nomtarj, venta.expmon, venta.expyear, venta.cvc, venta.recibir , venta.cambio,
GROUP_CONCAT( products.nompro, '..', products.codigo, '..',products.precV, '..', productos_vendidos.canti SEPARATOR '__') AS products FROM venta INNER JOIN productos_vendidos ON productos_vendidos.id_venta = venta.id_venta INNER JOIN products ON products.id_prod = productos_vendidos.id_prod INNER JOIN owner ON venta.id_due =owner.id_due WHERE owner.id_due = '$id_due'  GROUP BY venta.id_venta ORDER BY venta.id_venta DESC;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Comprobante</th>
                                                                <th>Fecha</th>
                                                                <th>Estado</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($ventas as $venta){ ?>
                                                            <tr>
                                    <td><?php echo $venta->tipoc ?></td>
                                    <td><?php echo $venta->fecha ?></td>
                                                               <td>
                <?php    

                if($venta->estado==1)  { ?> 
                <form  method="get" action="javascript:activo('<?php echo $venta->id_venta; ?>')">
                   
                    <span class="label label-success">Aceptado</span>
                </form>
                <?php  }   else {?> 

                    <form  method="get" action="javascript:inactivo('<?php echo $venta->id_venta; ?>')"> 
                        <button type="submit" class="btn btn-danger btn-xs">Anuladas</button>
                     </form>
                        <?php  } ?>                         
            </td>

                                            <td>S/.<?php echo $venta->total ?></td>
                                                                <td><a href="report?id=<?php echo $venta->id_venta; ?>" class="btn btn__bg">View</a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Método de pago</h3>
                                              <div class="card">
  <div class="card__front card__part">
    <img class="card__front-square card__square" src="../../assets/img/icon/chip.png">
    <img class="card__front-logo card__logo" src="../../assets/img/icon/visa.png">
    <p class="card_numer">**** **** **** 6258</p>
    <div class="card__space-75">
      <span class="card__label">Card holder</span>
      <p class="card__info">John Doe</p>
    </div>
    <div class="card__space-25">
      <span class="card__label">Expires</span>
            <p class="card__info">10/25</p>
    </div>
  </div>
  
  <div class="card__back card__part">
    <div class="card__black-line"></div>
    <div class="card__back-content">
      <div class="card__secret">
        <p class="card__secret--last">420</p>
      </div>
      <img class="card__back-square card__square" src="../../assets/img/icon/chip.png">
      <img class="card__back-logo card__logo" src="../../assets/img/icon/visa.png">
      
    </div>
  </div>
</div>
                                            </div>


                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Dirección de Envio</h3>
                                                <address>
                                                    <p><strong>Alex Tuntuni</strong></p>
                                                    <p>1355 Market St, Suite 900 <br>
                                                        San Francisco, CA 94103</p>
                                                        <p>Mobile: (123) 456-7890</p>
                                                </address>
                                                <a href="#" class="btn btn__bg"><i class="fa fa-edit"></i>
                                                    Edit Address</a>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Detalles de la cuenta</h3>
         <!-- DESDE ACA EMPIEZA EL DETALLE DEL DUEÑO --> 


         <?php
function connect(){
return new mysqli("localhost","root","","vetdog");
}
 $id_due=$_SESSION['id_due'];
$con = connect();
$sql = "SELECT owner.id_due, owner.dni_due, owner.nom_due, owner.ape_due, owner.fecnaci, owner.movil, owner.movil, owner.fijo, owner.correo, owner.direc, owner.usuario FROM owner  WHERE owner.id_due = '$id_due'";
$query  =$con->query($sql);
$data =  array();
if($query){
    while($r = $query->fetch_object()){
        $data[] = $r;
    }
}
?>
<?php if(count($data)>0):?>
    <?php foreach($data as $d):?>                                      
                                                <div class="account-details-form">
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="first-name" class="required">Nombres</label>
                                                                    <input value="<?php echo $d->nom_due; ?>" type="text" id="first-name" placeholder="Nombres" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="last-name" class="required">Apellidos</label>
                                                                    <input value="<?php echo $d->ape_due; ?>" type="text" id="last-name" placeholder="Apellidos" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <label for="email" class="required">Dirección de correo electrónico</label>
                                                            <input type="email" value="<?php echo $d->correo; ?>" id="email" placeholder="Dirección de correo electrónico" />
                                                        </div>
                                                        <fieldset>
                                                            <legend>Cambiar contraseña</legend>
                                                            

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">Nuevo contraseña</label>
                                                                        <input type="password" id="new-pwd" placeholder="Nuevo contraseña" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button class="btn btn__bg">Guardar cambios</button>
                                                        </div>
                                                    </form>
                                                </div>
<!-- DESDE ACA TERMINA EL DETALLE DEL DUEÑO --> 
<?php endforeach; ?>
                            <?php else:?>
                            <p class="alert alert-warning"><strong>No hay datos</strong></p>
                            <?php endif; ?>   
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>

<!-- POR ACA TERMINA---------------------------------------------------------------------------->
         
       
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
                                        <p>0412-4773077</p>
                                    </div>
                                </div>
                                <div class="footer-contact-info">
                                    <h6>Datos de contacto:</h6>
                                    <p>Urbanización Las Mercedes Sector 4 calle 2 casa N 6 La Victoria Estado Aragua.</p>
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