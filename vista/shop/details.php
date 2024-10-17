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
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="shop">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">detalle de producto</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        define("KEY", "nestortol");
        define("COD", "AES-128-ECB");
        define("SERVIDOR", "localhost");
        define("USUARIO", "root");
        define("PASSWORD", "");
        define("BD", "vetdog");
        $servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;
        try {
            $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
        }
        ?>
        <?php
        include 'carrito.php';
        ?>
        <?php
        $id = $_GET['id'];
        $sentencia = $pdo->prepare("SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE id_prod= '$id'");
        $sentencia->execute();
        $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach ($listaProductos as $producto) { ?>
            <?php if ($mensaje != "") { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $mensaje; ?>
                    <a href="./cart" class="btn btn-success"> Ver Carrito </a>
                </div>
            <?php } ?>
            <div class="shop-main-wrapper pt-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 order-1 order-lg-2">
                            <div class="product-details-inner">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="product-large-slider img-zoom mb-20">
                                            <div class="pro-large-img">
                                                <img src="../../../vetdog/assets/img/subidas/<?php echo $producto['foto']; ?>"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="product-details-des">
                                            <h5 class="product-name"><a href="#"><?php echo $producto['nompro']; ?></a></h5>
                                            <div class="ratings">
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                            </div>
                                            <div class="price-box">
                                                <span class="price-regular">$/<?php echo $producto['precV']; ?></span>
                                            </div>
                                            <p><?php echo $producto['descp']; ?>.</p>
                                            <div class="availability mt-10 mb-20">
                                                <i class="ion-checkmark-circled"></i>
                                                <span><?php echo $producto['stock']; ?> en stock</span>
                                            </div>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <form action="" method="POST">
                                                <input type="hidden" name="id_prod" id="id_prod"
                                                    value="<?php echo openssl_encrypt($producto['id_prod'], COD, KEY); ?>">
                                                <input type="hidden" name="nompro" id="nompro"
                                                    value="<?php echo openssl_encrypt($producto['nompro'], COD, KEY); ?>">
                                                <input type="hidden" name="precV" id="precV"
                                                    value="<?php echo openssl_encrypt($producto['precV'], COD, KEY); ?>">
                                                <input type="hidden" name="stock" id="stock"
                                                    value="<?php echo openssl_encrypt($producto['stock'], COD, KEY); ?>">
                                                <input type="hidden" name="canti" id="canti"
                                                    value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                                                <div class="action_link">
                                                    <button value="Agregar" name="btnAccion" style="margin-top: 10px;"
                                                        type="submit" class="buy-btn"> <i class="ion-bag"></i>Añadir al
                                                        carrito</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tag-line mt-18">
                                            <h5>tags:</h5>
                                            <a href="category?id=<?php echo $producto['id_cate']; ?>">
                                                <?php echo $producto['nomcate']; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-details-reviews pt-32">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product-review-info">
                                            <ul class="nav review-tab">
                                                <li>
                                                    <a class="active" data-bs-toggle="tab" href="#tab_one">descripción</a>
                                                </li>
                                                <li>
                                                    <a data-bs-toggle="tab" href="#tab_two">información</a>
                                                </li>
                                                <li>
                                                    <a data-bs-toggle="tab" href="#tab_three">opiniones (0)</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content reviews-tab">
                                                <div class="tab-pane fade show active" id="tab_one">
                                                    <div class="tab-one">
                                                        <p><?php echo $producto['descp']; ?>.</p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab_two">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td>peso</td>
                                                                <td><?php echo $producto['peso']; ?>.</td>
                                                            </tr>
                                                            <tr>
                                                                <td>precio</td>
                                                                <td>$/<?php echo $producto['precV']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>stock</td>
                                                                <td><?php echo $producto['stock']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="tab_three">
                                                    <form action="#" class="review-form">
                                                        <h5>opiniones <span>0</span></h5>
                                                        <div class="total-reviews">
                                                            <div class="rev-avatar">
                                                                <img src="assets/img/about/avatar.jpg" alt="">
                                                            </div>
                                                            <div class="review-box">
                                                                <div class="ratings">
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                                    <span><i class="fa fa-star"></i></span>
                                                                </div>
                                                                <div class="post-author">
                                                                    <p><span>admin -</span> 30 Nov, 2018</p>
                                                                </div>
                                                                <p>Aliquam fringilla euismod risus ac bibendum. Sed sit
                                                                    amet sem varius ante feugiat lacinia. Nunc ipsum nulla,
                                                                    vulputate ut venenatis vitae, malesuada ut mi. Quisque
                                                                    iaculis, dui congue placerat pretium, augue erat
                                                                    accumsan lacus</p>
                                                            </div>
                                                        </div>
                                                    </form> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="related-product pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-header-wrap">
                            <div class="section-title">
                                <h2>otros productos que te pueden interesar</h2>
                            </div>
                            <div class="ht-slick-nav slick-append">
                                <button class="prev-four"><i class="ion-ios-arrow-left"></i></button>
                                <button class="next-four right"><i class="ion-ios-arrow-right"></i></button>
                            </div>
                        </div>
                        <div class="categories-features-wrapper">
                            <div class="ht-slick-slider-wrap">
                                <div class="ht-slick-slider slick-row-15"
                                    data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "speed": 1000, "arrows": true, "prevArrow": ".prev-four", "nextArrow": ".next-four", "responsive":[{"breakpoint":992, "settings":{"slidesToShow": 3}}, {"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                                    <?php
                                    include_once('../config/dbconect.php');
                                    $database = new Connection();
                                    $db = $database->open();
                                    try {
                                        $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod ASC ';
                                        foreach ($db->query($sql) as $row) {
                                            ?>
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <a href="#">
                                                        <img src="../../../vetdog/assets/img/subidas/<?php echo $row['foto']; ?>" alt="" style="height: 300px;">
                                                    </a>
                                                    <div class="add-to-links">
                                                        <a href="#" data-bs-toggle="tooltip" title="Añadir al carrito"><i
                                                                class="ion-bag"></i></a>
                                                        <a href="details?id=<?php echo $row['id_prod']; ?>"><span
                                                                data-bs-toggle="tooltip" title="Vista rapida"><i
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
                                                            <span class="price-regular">$/<?php echo $row['precV']; ?></span>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include '../Includes/Footer.php'; ?>
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <script src="../../assets/js/vendor.js"></script>
    <script src="../../assets/js/active.js"></script>
</body>
</html>