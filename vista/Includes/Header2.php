<header class="header-area">
        <div class="main-header d-none d-lg-block">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="welcome-message">
                                <p>Bienvenido</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center">
                                    <!--- <li class="account-settings">
                                        Mi cuenta
                                        <i class="fa fa-angle-down"></i> -->
                                        <ul class="dropdown-list account-list">
                                            <li>
                                                <a href="account/login-register">Iniciar Sesión</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="tiendaonline">
                                    <img src="../assets/img/logo/image(1).png" alt="">
                                </a>
                            </div>
                        </div>
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
                                        <a href="account/login-register">
                                            <i class="ion-bag"></i>
                                            <span class="notification">0</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                include_once('config/dbconect.php');
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
                                $database->close();
                            ?>               
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="main-menu home-main">
                                <nav class="desktop-menu">
                                    <ul>
                                        
                                        <li>
                                            <a href="#">perros <i class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title"><a href="#">Alimentos perros</a>
                                                    <ul>
                                            <?php
                                                include_once('config/dbconect.php');
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
                                                $database->close();
                                            ?>
                                            </ul>
                                        </li>
                                    <li class="mega-title"><a href="#">Cuidado e higiene</a>
                                <ul>
                                    <?php
                                        include_once('config/dbconect.php');
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
                                    $database->close();
                                    ?>                                        
            </ul>
                </li>
                    <li class="mega-title"><a href="#">Farmacia</a>
                <ul>
                <?php
                    include_once('config/dbconect.php');
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
            $database->close();
        ?>                                        
        </ul>
            </li>
                <li class="mega-title"><a href="#">Accesorios</a>
                    <ul>
                <?php
                    include_once('config/dbconect.php');
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
                include_once('config/dbconect.php');
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
            $database->close();
        ?>
        </ul>
            </li>
        <li class="mega-title"><a href="#">Cuidado e higiene</a>
            <ul>
        <?php
            include_once('config/dbconect.php');
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
            $database->close();
        ?>                                        
        </ul>
    </li>
        <li class="mega-title"><a href="#">Farmacia</a>
    <ul>
        <?php
            include_once('config/dbconect.php');
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
            $database->close();
        ?>                                        
        </ul>
            </li>
        <li class="mega-title"><a href="#">Accesorios</a>
        <ul>
            <?php
            include_once('config/dbconect.php');
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
            $database->close();
        ?>                                        
        </ul>
            </li>
                </ul>
                    </li>
                        <li>
                            <a href="contact/contact">Contactanos</a>
                        </li>
                            </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="contact-top">
                                <div class="contact-top-icon">
                                    <img src="../assets/img/icon/download.png" alt="">
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
        </div>
        <div class="mobile-header d-lg-none d-md-block sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-header-top">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center justify-content-center">
                                    <!--- <li class="account-settings">
                                        Mi cuenta
                                        <i class="fa fa-angle-down"></i> -->
                                        <ul class="dropdown-list account-list">
                                            <li><a href="account/login-register">Iniciar Sesión/Registrarse</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="tiendaonline">
                                    <img src="../assets/img/logo/image(1).png" alt="Vetdog Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="account/login-register">
                                        <i class="ion-bag"></i>
                                        <span class="notification">0</span>
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
                                Categorias
                                <span><i class="ion-android-arrow-dropdown"></i></span>
                            </div>
                            <nav class="category-menu">
                                <ul class="categories-list">
                                    <?php
                                        include_once('config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try{    
                                            $sql = 'SELECT * FROM category';
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
                                        $database->close();
                                    ?>                                  
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>