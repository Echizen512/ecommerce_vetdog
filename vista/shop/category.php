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
                                    
                                    <li class="breadcrumb-item active" aria-current="page">categoria de producto</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="shop-main-wrapper pt-40 pb-40">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>categorias</h3>
                                </div>
                                <div class="sidebar-body">
                                    
                                    <div class="shop-categories">
                                        <nav>
                                            <ul class="mobile-menu">
                                                <?php
            
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT * FROM category';
                foreach ($db->query($sql) as $row) {
                    ?>    
                                                <li class="menu-item-has-children"><a href="#"><?php echo $row['nomcate']; ?></a>
                                                    
                                                </li>
                                            <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            
            $database->close();

        ?>  
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- mobile menu navigation end -->
                                </div>
                            </div>
                           
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-banner">
                                <div class="banner-statistics-wrapper">
                                    <div class="banner-statistics">
                                        <div class="img-container">
                                            <a href="#">
                                                <img src="../../assets/img/product/crockes.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="banner-statistics">
                                        <div class="img-container">
                                            <a href="#">
                                                <img src="../../assets/img/product/cxxx.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->
                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop page header banner start -->
                            <div class="shop-header-banner pb-40">
                                <img src="assets/img/banner/fruits-vegetables.jpg" alt="">
                            </div>
                            <!-- shop page header end -->

                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view"><i class="fa fa-list"></i></a>
                                            </div>
                                            <div class="product-amount">
                                                <p>Showing 1–16 of 21 results</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Relevance</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list start -->
                            <div class="shop-product-wrap grid-view row pt-40">
<!-- ---------------------------DESDE ACA EMPIEZA -------------------------------------->

<?php

    define("KEY", "nestortol");
    define("COD", "AES-128-ECB");

    define("SERVIDOR", "localhost");
    define("USUARIO", "root");
    define("PASSWORD", "");
    define("BD", "vetdog");


     $servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

    try{

        $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    } catch(PDOException $e){

    }
    
?>

<?php 
include 'carrito.php';
?>

    <?php

    $id = $_GET['id'];
    $sentencia = $pdo->prepare("SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate= '$id'");
    $sentencia->execute();

    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php foreach ($listaProductos as $producto) { ?>

        <?php if($mensaje != ""){ ?>
    <div class="alert alert-success" role="alert">
        <?php echo $mensaje; ?>
        <a href="./cart" class="btn btn-success"> Ver Carrito </a>
    </div>
<?php } ?>
                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item mb-30">
                                        
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="../../assets/img/product/<?php echo $producto['foto']; ?>" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Añadir al carrito"><i class="ion-bag"></i></a>

                                                <a href="details?id=<?php echo $producto['id_prod']; ?>"><span data-bs-toggle="tooltip" title="Vista rapida"><i class="ion-ios-eye-outline"></i></span></a>

                                            

                                            </div>
                                            <div class="product-badge product-badge__2">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-5%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-content">
                                            <div class="product-content">
                                                <div class="product-name">
                                                    <h5><a href="#"><?php echo $producto['nompro']; ?></a></h5>
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
                                                    <span class="price-regular">S/<?php echo $producto['precV']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    <div class="product-list-item mb-30">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="../../assets/img/product/<?php echo $producto['foto']; ?>" alt="">
                                            </a>
                                            <div class="product-badge product-badge__2">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>-5%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content-list">
                                            <h5 class="product-name"><a href="#"><?php echo $producto['nompro']; ?></a></h5>
                                            <div class="ratings">
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                            </div>
                                            <div class="price-box">
                                              
                                                <span class="price-regular">S/<?php echo $producto['precV']; ?></span>
                                            </div>
                                            <p><?php echo $producto['descp']; ?>.</p>

<div class="product-list-link">
    <form action="" method="POST">
        <input type="hidden" name="id_prod" id="id_prod" value="<?php echo openssl_encrypt($producto['id_prod'], COD, KEY); ?>">
                        <input type="hidden" name="nompro" id="nompro" value="<?php echo openssl_encrypt($producto['nompro'], COD, KEY); ?>">
                        <input type="hidden" name="precV" id="precV" value="<?php echo openssl_encrypt($producto['precV'], COD, KEY); ?>">
                        <input type="hidden" name="canti" id="canti" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">


        <button value="Agregar" name="btnAccion" type="submit" data-bs-toggle="tooltip" title="Añadir al Carro" data-bs-placement="top" class="add-btn">Añadir al carrito</button>
                                                
            <a href="details?id=<?php echo $producto['id_prod']; ?>"><span data-bs-toggle="tooltip"  title="Vista rapida" data-bs-placement="top"><i class="ion-ios-eye-outline"></i></span></a>

    </form>                                          
</div>
                                        </div>
                                    </div> <!-- product list item end -->
                                </div>
    <?php } ?>    
  <!-- ---------------------------DESDE ACA TERMINA -------------------------------------->                             
                            </div>
                            <!-- product item list end -->

                            <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                    <li><a class="previous" href="#"><i class="ion-ios-arrow-left"></i>Previous</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#">Next<i class="ion-ios-arrow-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
<!-- POR ACA TERMINA---------------------------------------->
       

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