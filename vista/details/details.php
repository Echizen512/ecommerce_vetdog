<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Vetdog - Tienda de productos para tu mascota</title>
    <link rel="shortcut icon" href="../../assets/img/ico.png" type="image/x-icon" />
    <link href="../../../fonts.googleapis.com/css467e.css?family=Muli:300,400,400i,600,700,800%7CWork+Sans:300,400,500,600,700,800" rel="stylesheet">
    <link href="../../assets/css/vendor.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>

<?php 
include '../Includes/Header.php'; 
include '../Includes/Aside.php';
?>

    <main>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../tiendaonline">Home</a></li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">detalle de producto</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <?php         
                function connect(){
                return new mysqli("localhost","root","","vetdog");
                }
                $con = connect();
                $id = $_GET['id'];
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE id_prod= '$id'";
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
        <div class="shop-main-wrapper pt-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 order-1 order-lg-2">
                        
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider img-zoom mb-20">
                                        <div class="pro-large-img">
                                            <img src="../../assets/img/product/<?php echo $d->foto; ?>" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <h5 class="product-name"><a href="#"><?php echo $d->nompro; ?></a></h5>
                                        <div class="ratings">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            
                                        </div>
                                        <div class="price-box">
                                            
                                            <span class="price-regular">S/<?php echo $d->precV; ?></span>
                                        </div>
                                        <p><?php echo $d->descp; ?>.</p>
                                        <div class="availability mt-10 mb-20">
                                            <i class="ion-checkmark-circled"></i>
                                            <span><?php echo $d->stock; ?> en stock</span>
                                        </div>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" value="1"></div>
                                            </div>
                                            <div class="action_link">
                                                <a class="buy-btn" href="../account/login-register"><i class="ion-bag"></i>Añadir al carrito</a>
                                            </div>
                                        </div>
                                        <div class="tag-line mt-18">
                                            <h5>tags:</h5>
                                            <a href="#"><?php echo $d->nomcate; ?></a>
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
                                                    <p><?php echo $d->descp; ?>.</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>peso</td>
                                                            <td><?php echo $d->peso; ?>.</td>
                                                        </tr>
                                                        <tr>
                                                            <td>precio</td>
                                                            <td>S/<?php echo $d->precV; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>stock</td>
                                                            <td><?php echo $d->stock; ?></td>
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
        <?php endforeach; ?>
    <?php else:?>
    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
    No hay datos
        </span>
    <?php endif; ?> 
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
                                <div class="ht-slick-slider slick-row-15" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "speed": 1000, "arrows": true, "prevArrow": ".prev-four", "nextArrow": ".next-four", "responsive":[{"breakpoint":992, "settings":{"slidesToShow": 3}}, {"breakpoint":768, "settings":{"slidesToShow": 2}}, {"breakpoint":480, "settings":{"slidesToShow": 1}}]}'>
                            <?php
                                include_once('../config/dbconect.php');
                                $database = new Connection();
                                $db = $database->open();
                                try{    
                                    $sql = 'SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove ORDER BY id_prod ASC ';
                                    foreach ($db->query($sql) as $row) {
                                ?>      
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img src="../../assets/img/product/<?php echo $row['foto']; ?>" alt="">
                                            </a>
                                            <div class="add-to-links">
                                                <a href="cart.html" data-bs-toggle="tooltip" title="Add to Cart"><i class="ion-bag"></i></a>
                                                <a href="details?id=<?php echo $row['id_prod']; ?>"><span data-bs-toggle="tooltip" title="Quick View"><i class="ion-ios-eye-outline"></i></span></a>
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