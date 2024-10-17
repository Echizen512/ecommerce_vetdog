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
                        <li class="menu-item-has-children"><a href="#">perros</a>
                            <ul class="megamenu dropdown">
                                <li class="mega-title has-children"><a href="#">Alimentos perros</a>
                                    <ul class="dropdown">
                                        <?php
                                        include_once('../config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                                            foreach ($db->query($sql) as $row) {
                                                ?>
                                                <li>
                                                    <a href="#"><?php echo $row['nomcate']; ?></a>
                                                </li>
                                            <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children"><a href="#">Cuidado e higiene</a>
                                    <ul class="dropdown">
                                        <?php
                                        include_once('../config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                                            foreach ($db->query($sql) as $row) {
                                                ?>
                                                <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                                            <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children"><a href="#">Farmacia</a>
                                    <ul class="dropdown">
                                        <?php
                                        include_once('../config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                                            foreach ($db->query($sql) as $row) {
                                                ?>
                                                <li>
                                                    <a href="#"><?php echo $row['nomcate']; ?></a>
                                                </li>
                                            <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children"><a href="#">Accesorios</a>
                                    <ul class="dropdown">
                                        <?php
                                        include_once('../config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                                            foreach ($db->query($sql) as $row) {
                                                ?>
                                                <li>
                                                    <a href="#"><?php echo $row['nomcate']; ?></a>
                                                </li>
                                            <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
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
                                        include_once('../config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                                            foreach ($db->query($sql) as $row) {
                                                ?>
                                                <li>
                                                    <a href="#"><?php echo $row['nomcate']; ?></a>
                                                </li>
                                            <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children"><a href="#">Cuidado e higiene</a>
                                    <ul class="dropdown">
                                        <?php
                                        include_once('../config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                                            foreach ($db->query($sql) as $row) {
                                                ?>
                                                <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                                            <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children"><a href="#">Farmacia</a>
                                    <ul class="dropdown">
                                        <?php
                                        include_once('../config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                                            foreach ($db->query($sql) as $row) {
                                                ?>
                                                <li>
                                                    <a href="#"><?php echo $row['nomcate']; ?></a>
                                                </li>
                                            <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                                <li class="mega-title has-children"><a href="#">Accesorios</a>
                                    <ul class="dropdown">
                                        <?php
                                        include_once('../config/dbconect.php');
                                        $database = new Connection();
                                        $db = $database->open();
                                        try {
                                            $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                                            foreach ($db->query($sql) as $row) {
                                                ?>
                                                <li>
                                                    <a href="#"><?php echo $row['nomcate']; ?></a>
                                                </li>
                                            <?php
                                            }
                                        } catch (PDOException $e) {
                                            echo "Hubo un problema en la conexión: " . $e->getMessage();
                                        }
                                        $database->close();
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="../contact/contact">Contactanos</a></li>
                    </ul>
                </nav>
            </div>
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
        </div>
    </div>
</aside>