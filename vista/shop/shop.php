<?php
session_start();
if (!isset($_SESSION['cargo']) == 2) {
    header('location: ../tiendaonline');
    $id_due = $_SESSION['id_due'];
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
    <link rel="shortcut icon" href="../../assets/img/ico.png" type="image/x-icon" />
    <link
        href="../../../fonts.googleapis.com/css467e.css?family=Muli:300,400,400i,600,700,800%7CWork+Sans:300,400,500,600,700,800"
        rel="stylesheet">
    <link href="../../assets/css/vendor.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php include '../Includes/Header_Shop.php'; ?>
    <main>
        <div class="hero-slider-wrapper mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slider-active slick-dot-style">
                            <div class="hero-item-inner">
                                <div class="hero-slider-item d-flex align-items-center bg-img"
                                    data-bg="../../assets/img/slider/slider1.png">
                                    <div class="hero-slider-content">
                                        <h1>Bolsa llena de <br> Productos</h1>
                                        <h4>Hasta 10% en <br> Comida para cachorro y adulto</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-item-inner">
                                <div class="hero-slider-item d-flex align-items-center bg-img"
                                    data-bg="../../assets/img/slider/fondobolsa1.png">
                                    <div class="hero-slider-content">
                                        <h1>Promocion Navideña</h1>
                                        <h4>Hasta 10% en <br> En todos los productos Rikokan</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-feature pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner-feature-wrapper">
                            <div class="banner-feature-item">
                                <div class="banner-feature-icon">
                                    <img src="../../assets/img/icon/icon1.png" alt="">
                                </div>
                                <div class="banner-feature-post">
                                    <h6>Entrega rapida</h6>
                                    <p>Envío gratis en todos los pedidos superiores a $ 200.</p>
                                </div>
                            </div>
                            <div class="banner-feature-item">
                                <div class="banner-feature-icon">
                                    <img src="../../assets/img/icon/icon2.png" alt="">
                                </div>
                                <div class="banner-feature-post">
                                    <h6>Soporte 24/7</h6>
                                    <p>Contáctenos las 24 horas del día, los 7 días de la semana.</p>
                                </div>
                            </div>
                            <div class="banner-feature-item">
                                <div class="banner-feature-icon">
                                    <img src="../../assets/img/icon/icon3.png" alt="">
                                </div>
                                <div class="banner-feature-post">
                                    <h6>Devoluciones de 60 días</h6>
                                    <p>Si no te encanta, tienes 60 días para devolverlo.</p>
                                </div>
                            </div>
                            <div class="banner-feature-item">
                                <div class="banner-feature-icon">
                                    <img src="../../assets/img/icon/icon4.png" alt="">
                                </div>
                                <div class="banner-feature-post">
                                    <h6>Pago 100% seguro</h6>
                                    <p>Garantizamos un pago seguro.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-categories-area pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single-item">
                            <div class="feature-product-title">
                                <h3>nuevos productos</h3>
                            </div>
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15"
                                    data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-new", "nextArrow": ".next-new", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                    <!-- single item start -->
                                    <!-- ---------POR ACA PONDRE EL CODI ------------------------------>
                                    <?php
                                    include_once('../config/dbconect.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod DESC  LIMIT 5';
                                        foreach ($db->query($sql) as $row) {
                                            ?>
                                            <div class="feature-product-item">
                                                <div class="product-thumb">
                                                    <a href="#">
                                                        <img src="../../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>"
                                                            alt="">
                                                    </a>
                                                    <div class="add-to-links">
                                                        <a href="#" data-bs-toggle="tooltip" title="Añadir al carrito"><i
                                                                class="ion-bag"></i></a>
                                                        <!-- COMIENZA EL MODAL ----------------->
                                                <a href="details?id=<?php echo $row['id_prod']; ?>"><span
                                                        data-bs-toggle="tooltip" title="Ver"><i
                                                            class="ion-ios-eye-outline"></i></span></a>
                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="price-box">
                                                    <span class="price-regular">S/
                                                        <?php echo $row['precV']; ?>
                                                    </span>
                                                </div>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>Nuevo</span>
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
                                                    <h5><a href="#">
                                                            <?php echo $row['nompro']; ?>
                                                        </a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    } catch (PDOException $e) {
                                        echo "Hubo un problema en la conexión: " . $e->getMessage();
                                    }
                                    $database->close();
                                    ?>
                                </div>
                                <div class="ht-slick-nav">
                                    <button class="prev-new"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-new right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single-item">
                            <div class="feature-product-title">
                                <h3>destacados</h3>
                            </div>
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15"
                                    data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-feat", "nextArrow": ".next-feat", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                    <?php
                                    include_once('../config/dbconect.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod ASC  LIMIT 5';
                                        foreach ($db->query($sql) as $row) {
                                            ?>
                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="../../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>"
                                                    alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Añadir al carrito"><i
                                                        class="ion-bag"></i></a>
                                                <a href="details?id=<?php echo $row['id_prod']; ?>"><span
                                                        data-bs-toggle="tooltip" title="Ver"><i
                                                            class="ion-ios-eye-outline"></i></span></a>
                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="price-box">
                                                    <span class="price-regular">S/
                                                        <?php echo $row['precV']; ?>
                                                    </span>
                                                </div>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>Nuevo</span>
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
                                                    <h5><a href="#">
                                                            <?php echo $row['nompro']; ?>
                                                        </a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    } catch (PDOException $e) {
                                        echo "Hubo un problema en la conexión: " . $e->getMessage();
                                    }
                                    $database->close();
                                    ?>
                                </div>
                                <div class="ht-slick-nav">
                                    <button class="prev-feat"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-feat right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single-item">
                            <div class="feature-product-title">
                                <h3>vendidos</h3>
                            </div>
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15"
                                    data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-best", "nextArrow": ".next-best", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                    <?php
                                    include_once('../config/dbconect.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod DESC  LIMIT 5';
                                        foreach ($db->query($sql) as $row) {
                                            ?>
                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#">
                                                <img src="../../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>"
                                                    alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Añadir al carrito"><i
                                                        class="ion-bag"></i></a>
                                                <a href="details?id=<?php echo $row['id_prod']; ?>"><span
                                                        data-bs-toggle="tooltip" title="Ver"><i
                                                            class="ion-ios-eye-outline"></i></span></a>
                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="price-box">
                                                    <span class="price-regular">S/
                                                        <?php echo $row['precV']; ?>
                                                    </span>
                                                </div>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>Nuevo</span>
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
                                                    <h5><a href="#">
                                                            <?php echo $row['nompro']; ?>
                                                        </a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    } catch (PDOException $e) {
                                        echo "Hubo un problema en la conexión: " . $e->getMessage();
                                    }
                                    $database->close();
                                    ?>
                                </div>
                                <div class="ht-slick-nav">
                                    <button class="prev-best"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-best right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-statistics-wrapper">
                            <div class="banner-statistics">
                                <div class="img-container">
                                    <a href="#"><img src="../../assets/img/product/crockes.png" alt=""></a>
                                </div>
                            </div>
                            <div class="banner-statistics">
                                <div class="img-container">
                                    <a href="#"><img src="../../assets/img/product/cxxx.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single-item">
                            <div class="feature-product-title">
                                <h3>Servicios</h3>
                            </div>
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15"
                                    data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-feat", "nextArrow": ".next-feat", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>

                                    <!-- Servicio 1 -->
                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#"><img src="../../assets/img/services/service1.jpg"
                                                    alt="Peluquería"></a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Ver Servicio"><i
                                                        class="ion-ios-eye-outline"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="product-name">
                                                    <h5><a href="#">Peluquería para Mascotas</a></h5>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price-regular">Desde $20</span>
                                                </div>
                                                <div class="ratings">
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star-outline"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Servicio 2 -->
                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#"><img src="../../assets/img/services/service2.jpg"
                                                    alt="Guardería"></a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Ver Servicio"><i
                                                        class="ion-ios-eye-outline"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="product-name">
                                                    <h5><a href="#">Guardería para Mascotas</a></h5>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price-regular">Desde $15</span>
                                                </div>
                                                <div class="ratings">
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star"></i></span>
                                                    <span><i class="ion-android-star-outline"></i></span>
                                                    <span><i class="ion-android-star-outline"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ht-slick-nav">
                                    <button class="prev-feat"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-feat right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single-item">
                            <div class="feature-product-title">
                                <h3>Información</h3>
                            </div>
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15"
                                    data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-info", "nextArrow": ".next-info", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>

                                    <!-- Información 1 -->
                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#"><img src="../../assets/img/info/about.jpg" style="height: 200px; width: 100%;
                                                    alt="Sobre Nosotros"></a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Ver Información"><i
                                                        class="ion-ios-eye-outline"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="product-name">
                                                    <h5><a href="#">Sobre Nosotros</a></h5>
                                                </div>
                                                <p>Conoce más acerca de nuestra tienda y los valores que nos guían.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Información 2 -->
                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#"><img src="../../assets/img/info/contact.jpg" style="height: 200px; width: 100%; alt="Contáctanos"></a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Ver Información"><i
                                                        class="ion-ios-eye-outline"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="product-name">
                                                    <h5><a href="#">Contáctanos</a></h5>
                                                </div>
                                                <p>¿Tienes alguna duda? Ponte en contacto con nosotros aquí.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ht-slick-nav">
                                    <button class="prev-info"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-info right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-single-item">
                            <div class="feature-product-title">
                                <h3>Promociones</h3>
                            </div>
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15"
                                    data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-promo", "nextArrow": ".next-promo", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>

                                    <!-- Promoción 1 -->
                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#"><img src="../../assets/img/services/service1.jpg"
                                                    alt="Promo 1"></a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Ver Promoción"><i
                                                        class="ion-ios-eye-outline"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="product-name">
                                                    <h5><a href="#">20% de Descuento en Peluquería</a></h5>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price-regular">Solo $16</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Promoción 2 -->
                                    <div class="feature-product-item">
                                        <div class="product-thumb">
                                            <a href="#"><img src="../../assets/img/services/service2.jpg"
                                                    alt="Promo 2"></a>
                                            <div class="add-to-links">
                                                <a href="#" data-bs-toggle="tooltip" title="Ver Promoción"><i
                                                        class="ion-ios-eye-outline"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-feature-content">
                                            <div class="product-feature-content-inner">
                                                <div class="product-name">
                                                    <h5><a href="#">Descuento en Guardería por Tiempo Limitado</a></h5>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price-regular">Solo $12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ht-slick-nav">
                                    <button class="prev-promo"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-promo right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="categories-features-area pt-40 pb-40">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="categories-feature-title-inner">
                                        <div class="section-title">
                                            <h2>PROUCTOS</h2>
                                        </div>
                                        <div class="feature-tab-menu">
                                            <ul class="nav justify-content-start justify-content-lg-end">
                                                <li><a data-bs-toggle="tab" class="active" href="#one">todos</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="one">
                                            <div class="categories-features-wrapper">
                                                <div class="ht-slick-slider-wrap">
                                                    <div class="ht-slick-slider slick-row-15"
                                                        data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "speed": 1000, "arrows": true, "prevArrow": ".prev-meat", "nextArrow": ".next-meat", "responsive":[{"breakpoint":992, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                                        <?php
                                                        include_once('../config/dbconect.php');
                                                        $database = new Connection();
                                                        $db = $database->open();
                                                        try {
                                                            $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod DESC ';
                                                            foreach ($db->query($sql) as $row) {
                                                                ?>
                                                                <div class="product-item">
                                                                    <div class="product-thumb">
                                                                        <a href="#">
                                                                            <img src="../../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>"
                                                                                alt="">
                                                                        </a>
                                                                        <div class="add-to-links">
                                                                            <a href="#" data-bs-toggle="tooltip"
                                                                                title="Añadir al Carro"><i
                                                                                    class="ion-bag"></i></a>
                                                                            <a href="details?id=<?php echo $row['id_prod']; ?>"><span
                                                                                    data-bs-toggle="tooltip" title="Ver"><i
                                                                                        class="ion-ios-eye-outline"></i></span></a>
                                                                        </div>
                                                                        <div class="product-badge product-badge__2">
                                                                            <div class="product-label new">
                                                                                <span>Nuevo</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-content">
                                                                        <div class="product-content">
                                                                            <div class="product-name">
                                                                                <h5><a
                                                                                        href="#"><?php echo $row['nompro']; ?></a>
                                                                                </h5>
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
                                                                                <span
                                                                                    class="price-regular">S/<?php echo $row['precV']; ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        } catch (PDOException $e) {
                                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                                        }
                                                        $database->close();
                                                        ?>
                                                    </div>
                                                    <div class="ht-slick-nav">
                                                        <button class="prev-meat"><i
                                                                class="ion-ios-arrow-left"></i></button>
                                                        <button class="next-meat right"><i
                                                                class="ion-ios-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="categories-features-area pt-40 pb-40">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="categories-feature-title-inner">
                                        <div class="section-title">
                                            <h2>Animales en Adopción</h2>
                                        </div>
                                    </div>
                                    <div class="categories-features-wrapper">
                                        <div class="ht-slick-slider-wrap">
                                            <div class="ht-slick-slider slick-row-15"
                                                data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "speed": 1000, "arrows": true, "prevArrow": ".prev-adoption", "nextArrow": ".next-adoption", "responsive":[{"breakpoint":992, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                                <?php
                                                include_once('../config/dbconect.php');
                                                $database = new Connection();
                                                $db = $database->open();
                                                try {
                                                    $sql = 'SELECT id_animal, nombre, edad, tipo, condicion, imagen, estado FROM animales WHERE estado = "disponible"';
                                                    foreach ($db->query($sql) as $row) {
                                                        ?>
                                                        <div class="product-item">
                                                            <div class="product-thumb">
                                                                <a href="#"><img
                                                                        src="../../../vetdog/assets/img/adopcion/<?php echo $row['imagen']; ?>"
                                                                        alt="" class="img-fluid" style="height: 250px;"></a>
                                                                <div class="add-to-links">
                                                                    <button class="btn btn-primary"
                                                                        onclick="solicitarAdopcion(<?php echo $row['id_animal']; ?>)"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Solicitar adopción">Solicitar Adopción</button>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <div class="product-name">
                                                                    <h5><a href="#"><?php echo $row['nombre']; ?></a></h5>
                                                                </div>
                                                                <p>Edad: <?php echo $row['edad']; ?> años</p>
                                                                <p>Tipo: <?php echo $row['tipo']; ?></p>
                                                                <p>Condición: <?php echo $row['condicion']; ?></p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                } catch (PDOException $e) {
                                                    echo "Hubo un problema en la conexión: " . $e->getMessage();
                                                }
                                                $database->close();
                                                ?>
                                            </div>
                                            <div class="ht-slick-nav">
                                                <button class="prev-adoption"><i
                                                        class="ion-ios-arrow-left"></i></button>
                                                <button class="next-adoption right"><i
                                                        class="ion-ios-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        function solicitarAdopcion(id_animal) {
                            const id_due = <?php echo json_encode($_SESSION['id_due']); ?>; // Asegúrate de que esta variable esté disponible
                            fetch('solicitar_adopcion.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({ id_due, id_animal })
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Éxito',
                                            text: 'Solicitud de adopción enviada con éxito.',
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'Error: ' + (data.message || 'No se pudo enviar la solicitud. Inténtalo de nuevo.'),
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error de conexión',
                                        text: 'Error: ' + error,
                                    });
                                });
                        }
                    </script>
    </main>
    <?php include '../Includes/Footer.php'; ?>
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <script src="../../assets/js/vendor.js"></script>
    <script src="../../assets/js/active.js"></script>
</body>

</html>