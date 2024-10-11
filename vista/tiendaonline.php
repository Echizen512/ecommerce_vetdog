<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>VetDog</title>
    <link rel="shortcut icon" href="../assets/img/ico.png" type="image/x-icon" />
    <link href="../../../fonts.googleapis.com/css467e.css?family=Muli:300,400,400i,600,700,800%7CWork+Sans:300,400,500,600,700,800" rel="stylesheet">
    <link href="../assets/css/vendor.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>

<?php include './Includes/Header2.php'; ?>

<aside class="off-canvas-wrapper">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
            <i class="ion-android-close"></i>
        </div>

        <div class="off-canvas-inner">
            <div class="search-box-offcanvas">
                <form>
                    <input type="text" placeholder="Más de 50.000 productos ¡encuéntralos aquí!">
                    <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                </form>
            </div>

            <div class="mobile-navigation">
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children">
                            <a href="#">Perros</a>
                            <ul class="megamenu dropdown">
                                <li class="mega-title has-children">
                                    <a href="#">Alimentos perros</a>
                                    <ul class="dropdown">
                                        <?php
                                        include_once('config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {    
                                            $sql = "SELECT * FROM products 
                                                    INNER JOIN category ON products.id_cate = category.id_cate 
                                                    INNER JOIN supplier ON products.id_prove = supplier.id_prove  
                                                    WHERE category.id_cate =  '6'";
                                            foreach ($db->query($sql) as $row) {
                                                echo "<li><a href='#'>{$row['nomcate']}</a></li>";
                                            }
                                        } catch(PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children">
                                    <a href="#">Cuidado e higiene</a>
                                    <ul class="dropdown">
                                        <?php
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT * FROM products 
                                                    INNER JOIN category ON products.id_cate = category.id_cate 
                                                    INNER JOIN supplier ON products.id_prove = supplier.id_prove  
                                                    WHERE category.id_cate =  '7'";
                                            foreach ($db->query($sql) as $row) {
                                                echo "<li><a href='#'>{$row['nomcate']}</a></li>";
                                            }
                                        } catch(PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children">
                                    <a href="#">Farmacia</a>
                                    <ul class="dropdown">
                                        <?php
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT * FROM products 
                                                    INNER JOIN category ON products.id_cate = category.id_cate 
                                                    INNER JOIN supplier ON products.id_prove = supplier.id_prove  
                                                    WHERE category.id_cate =  '3'";
                                            foreach ($db->query($sql) as $row) {
                                                echo "<li><a href='#'>{$row['nomcate']}</a></li>";
                                            }
                                        } catch(PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children">
                                    <a href="#">Accesorios</a>
                                    <ul class="dropdown">
                                        <?php
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT * FROM products 
                                                    INNER JOIN category ON products.id_cate = category.id_cate 
                                                    INNER JOIN supplier ON products.id_prove = supplier.id_prove  
                                                    WHERE category.id_cate =  '2'";
                                            foreach ($db->query($sql) as $row) {
                                                echo "<li><a href='#'>{$row['nomcate']}</a></li>";
                                            }
                                        } catch(PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Gatos</a>
                            <ul class="megamenu dropdown">
                                <li class="mega-title has-children">
                                    <a href="#">Alimentos gatos</a>
                                    <ul class="dropdown">
                                        <?php
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {    
                                            $sql = "SELECT * FROM products 
                                                    INNER JOIN category ON products.id_cate = category.id_cate 
                                                    INNER JOIN supplier ON products.id_prove = supplier.id_prove  
                                                    WHERE category.id_cate =  '6'";
                                            foreach ($db->query($sql) as $row) {
                                                echo "<li><a href='#'>{$row['nomcate']}</a></li>";
                                            }
                                        } catch(PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children">
                                    <a href="#">Cuidado e higiene</a>
                                    <ul class="dropdown">
                                        <?php
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT * FROM products 
                                                    INNER JOIN category ON products.id_cate = category.id_cate 
                                                    INNER JOIN supplier ON products.id_prove = supplier.id_prove  
                                                    WHERE category.id_cate =  '7'";
                                            foreach ($db->query($sql) as $row) {
                                                echo "<li><a href='#'>{$row['nomcate']}</a></li>";
                                            }
                                        } catch(PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children">
                                    <a href="#">Farmacia</a>
                                    <ul class="dropdown">
                                        <?php
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT * FROM products 
                                                    INNER JOIN category ON products.id_cate = category.id_cate 
                                                    INNER JOIN supplier ON products.id_prove = supplier.id_prove  
                                                    WHERE category.id_cate =  '3'";
                                            foreach ($db->query($sql) as $row) {
                                                echo "<li><a href='#'>{$row['nomcate']}</a></li>";
                                            }
                                        } catch(PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children">
                                    <a href="#">Accesorios</a>
                                    <ul class="dropdown">
                                        <?php
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT * FROM products 
                                                    INNER JOIN category ON products.id_cate = category.id_cate 
                                                    INNER JOIN supplier ON products.id_prove = supplier.id_prove  
                                                    WHERE category.id_cate =  '2'";
                                            foreach ($db->query($sql) as $row) {
                                                echo "<li><a href='#'>{$row['nomcate']}</a></li>";
                                            }
                                        } catch(PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact/contact">Contáctanos</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</aside>

    <main>
    <div class="hero-slider-wrapper mt-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-slider-active slick-dot-style">
                        <div class="hero-item-inner">
                            <div class="hero-slider-item d-flex align-items-center bg-img" data-bg="../assets/img/slider/slider1.png">
                                <div class="hero-slider-content">
                                    <h1>Bolsa llena de <br> Productos</h1>
                                    <h4>Hasta 10% en <br> Comida para cachorro y adulto</h4>
                                </div>
                            </div>
                        </div>
                        <div class="hero-item-inner">
                            <div class="hero-slider-item d-flex align-items-center bg-img" data-bg="../assets/img/slider/fondobolsa1.png">
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
                                <img src="../assets/img/icon/icon1.png" alt="">
                            </div>
                            <div class="banner-feature-post">
                                <h6>Entrega rapida</h6>
                                <p>Envío gratis en todos los pedidos superiores a $200.</p>
                            </div>
                        </div>
                        <div class="banner-feature-item">
                            <div class="banner-feature-icon">
                                <img src="../assets/img/icon/icon2.png" alt="">
                            </div>
                            <div class="banner-feature-post">
                                <h6>Soporte 24/7</h6>
                                <p>Contáctenos las 24 horas del día, los 7 días de la semana.</p>
                            </div>
                        </div>
                        <div class="banner-feature-item">
                            <div class="banner-feature-icon">
                                <img src="../assets/img/icon/icon3.png" alt="">
                            </div>
                            <div class="banner-feature-post">
                                <h6>Devoluciones de 60 días</h6>
                                <p>Si no te encanta, tienes 60 días para devolverlo.</p>
                            </div>
                        </div>
                        <div class="banner-feature-item">
                            <div class="banner-feature-icon">
                                <img src="../assets/img/icon/icon4.png" alt="">
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
                            <h3>Nuevos productos</h3>
                        </div>
                        <div class="ht-slick-slider-wrap">
                            <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-new", "nextArrow": ".next-new", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                <?php
                                    include_once('config/dbconect.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod DESC  LIMIT 5';
                                        foreach ($db->query($sql) as $row) {
                                ?>
                                <div class="feature-product-item">
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>" alt="">
                                        </a>
                                        <div class="add-to-links">
                                            <a href="account/login-register" data-bs-toggle="tooltip" title="Añadir al carrito"><i class="ion-bag"></i></a>
                                            <a href="details/details?id=<?php echo $row['id_prod']; ?>" data-bs-toggle="tooltip" title="Vista rápida"><i class="ion-ios-eye-outline"></i></a>
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
                            <h3>Destacados</h3>
                        </div>
                        <div class="ht-slick-slider-wrap">
                            <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-feat", "nextArrow": ".next-feat", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                <?php
                                    include_once('config/dbconect.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod ASC  LIMIT 5';
                                        foreach ($db->query($sql) as $row) {
                                ?>
                                <div class="feature-product-item">
                                    <div class="product-thumb">
                                        <a href="#">
                                            <img src="../assets/img/product/<?php echo $row['foto']; ?>" alt="">
                                        </a>
                                        <div class="add-to-links">
                                            <a href="account/login-register" data-bs-toggle="tooltip" title="Añadir al carrito"><i class="ion-bag"></i></a>
                                            <a href="details/details?id=<?php echo $row['id_prod']; ?>" data-bs-toggle="tooltip" title="Vista rápida"><i class="ion-ios-eye-outline"></i></a>
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
                                                    <span>-10%</span>
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
            <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "prevArrow": ".prev-best", "nextArrow": ".next-best", "responsive":[{"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                <?php
                    include_once('config/dbconect.php');
                    $database = new Connection();
                    $db = $database->open();
                    try {    
                        $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre, products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere 
                                FROM products 
                                INNER JOIN category ON products.id_cate = category.id_cate 
                                INNER JOIN supplier ON products.id_prove = supplier.id_prove 
                                ORDER BY id_prod DESC LIMIT 5';
                        foreach ($db->query($sql) as $row) {
                ?>
                <div class="feature-product-item">
                    <div class="product-thumb">
                        <a href="#"><img src="../assets/img/product/<?php echo $row['foto']; ?>" alt=""></a>
                        <div class="add-to-links">
                            <a href="account/login-register" data-bs-toggle="tooltip" title="Añadir al carrito"><i class="ion-bag"></i></a>
                            <a href="details/details?id=<?php echo $row['id_prod']; ?>"><span data-bs-toggle="tooltip" title="Vista rápida"><i class="ion-ios-eye-outline"></i></span></a>
                        </div>
                    </div>
                    <div class="product-feature-content">
                        <div class="product-feature-content-inner">
                            <div class="price-box">
                                <span class="price-regular">S/<?php echo $row['precV']; ?></span>
                            </div>
                            <div class="product-badge">
                                <div class="product-label new"><span>new</span></div>
                                <div class="product-label discount"><span>-5%</span></div>
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
                    } catch(PDOException $e) {
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
                <a href="#"><img src="../assets/img/product/crockes.png" alt=""></a>
            </div>
        </div>
        <div class="banner-statistics">
            <div class="img-container">
                <a href="#"><img src="../assets/img/product/cxxx.png" alt=""></a>
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
                        <h2>perros y gatos</h2>
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
                                <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "speed": 1000, "arrows": true, "prevArrow": ".prev-meat", "nextArrow": ".next-meat", "responsive":[{"breakpoint":992, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                    <?php
                                        include_once('config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {    
                                            $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre, products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere 
                                                    FROM products 
                                                    INNER JOIN category ON products.id_cate = category.id_cate 
                                                    INNER JOIN supplier ON products.id_prove = supplier.id_prove 
                                                    ORDER BY id_prod DESC';
                                            foreach ($db->query($sql) as $row) {
                                    ?>
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <a href="product-details.html"><img src="../assets/img/product/<?php echo $row['foto']; ?>" alt=""></a>
                                            <div class="add-to-links">
                                                <a href="account/login-register" data-bs-toggle="tooltip" title="Add to Cart"><i class="ion-bag"></i></a>
                                                <a href="details/details?id=<?php echo $row['id_prod']; ?>"><span data-bs-toggle="tooltip" title="Quick View"><i class="ion-ios-eye-outline"></i></span></a>
                                            </div>
                                            <div class="product-badge product-badge__2">
                                                <div class="product-label new"><span>new</span></div>
                                            </div>
                                        </div>
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
                                                <span class="price-regular">S/<?php echo $row['precV']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                            }
                                        } catch(PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                    ?>
                                </div>
                                <div class="ht-slick-nav">
                                    <button class="prev-meat"><i class="ion-ios-arrow-left"></i></button>
                                    <button class="next-meat right"><i class="ion-ios-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
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
                <div class="section-header-wrap">
                    <div class="section-title">
                        <h2>nuestras categorias</h2>
                    </div>
                    <div class="ht-slick-nav slick-append">
                        <button class="prev-recom"><i class="ion-ios-arrow-left"></i></button>
                        <button class="next-recom right"><i class="ion-ios-arrow-right"></i></button>
                    </div>
                </div>

                <div class="categories-item-wrapper pt-30">
                    <div class="ht-slick-slider-wrap">
                        <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "rows": 2, "speed": 1000, "prevArrow": ".prev-recom", "nextArrow": ".next-recom", "responsive":[{"breakpoint":992, "settings":{"slidesToShow": 3}}, {"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1, "rows": 1}}]}'>
                            <?php
                                include_once('config/dbconect.php');
                                $database = new Connection();
                                $db = $database->open();
                                try {    
                                    $sql = 'SELECT * FROM category';
                                    foreach ($db->query($sql) as $row) {
                            ?>
                                <div class="categories-item">
                                    <div class="categories-content">
                                        <h5><a href="#"><?php echo $row['nomcate']; ?></a></h5>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
    

    <?php include './Includes/Footer2.php'; ?>

    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>

    <script src="../assets/js/vendor.js"></script>
    <script src="../assets/js/active.js"></script>

</body>
</html>