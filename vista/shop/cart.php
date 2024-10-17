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
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="../../assets/img/ico.png" type="image/x-icon" />
    <!-- Google fonts include -->
    <link
        href="../../../fonts.googleapis.com/css467e.css?family=Muli:300,400,400i,600,700,800%7CWork+Sans:300,400,500,600,700,800"
        rel="stylesheet">
    <!-- All Vendor & plugins CSS include -->
    <link href="../../assets/css/vendor.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/card-js.min.css" rel="stylesheet" type="text/css" />
    <style>
        .panel {
            background-color: #F5F5F7;
            border: 1px solid #ddd;
            padding: 20px;
            display: block;
            width: 270px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }
        .btn {
            background: rgb(68, 175, 231);
            /* Old browsers */
            background: -moz-linear-gradient(top, rgba(68, 175, 231, 1) 0%, rgba(49, 152, 223, 1) 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(68, 175, 231, 1) 0%, rgba(49, 152, 223, 1) 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(68, 175, 231, 1) 0%, rgba(49, 152, 223, 1) 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#44afe7', endColorstr='#3198df', GradientType=0);
            color: #fff;
            display: block;
            width: 100%;
            border: 1px solid rgba(46, 86, 153, 0.0980392);
            border-bottom-color: rgba(46, 86, 153, 0.4);
            border-top: 0;
            border-radius: 4px;
            font-size: 17px;
            text-shadow: rgba(46, 86, 153, 0.298039) 0px -1px 0px;
            line-height: 34px;
            -webkit-font-smoothing: antialiased;
            font-weight: bold;
            margin-top: 20px;
        }
        .btn:hover {
            cursor: pointer;
        }
    </style>
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
                                    <li class="breadcrumb-item active" aria-current="page">carrito de compras</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-main-wrapper pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table table-responsive">
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
                            <?php if (empty($_SESSION['CARRITO'])) { ?>
                                <div class="alert alert-success">
                                    El carrito está vacío.
                                </div>
                            <?php } else { ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-title">Producto</th>
                                            <th class="pro-price">Precio</th>
                                            <th class="pro-quantity">Cantidad</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; ?>
                                        <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                                            <tr>
                                                <td class="pro-title"><a href="#"><?php echo $producto['NOMBRE']; ?></a></td>
                                                <td class="pro-price"><span>S/<?php echo $producto['PRECIO']; ?></span></td>
                                                <td class="pro-quantity">
                                                    <span><?php echo $producto['CANTIDAD']; ?></span>
                                                </td>
                                                <td class="pro-subtotal">
                                                    <span>S/<?php echo number_format($producto['CANTIDAD'] * $producto['PRECIO'], 2); ?></span>
                                                </td>
                                                <td class="pro-remove">
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id_prod" id="id_prod"
                                                            value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                                                        <button class="btn btn-danger" name="btnAccion" value="Eliminar"
                                                            type="submit"> Eliminar </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $total = $total + ($producto['CANTIDAD'] * $producto['PRECIO']); ?>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="3" align="right">
                                                <h3>Total</h3>
                                            </td>
                                            <td align="right">
                                                <h3>S/<?php echo number_format($total, 2); ?></h3>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="checkout-page-wrapper pt-40 pb-32">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="checkoutaccordion" id="checkOutAccordion">
                                        <div class="card">
                                            <h3>Informacion del usuario <span data-bs-toggle="collapse"
                                                    data-bs-target="#couponaccordion">Click
                                                    Aqui</span></h3>
                                            <div id="couponaccordion" class="collapse"
                                                data-bs-parent="#checkOutAccordion">
                                                <div class="col-lg-6">
                                                    <div class="checkout-billing-details-wrap">
                                                        <h2>Detalles de facturación</h2>
                                                        <div class="billing-form-wrap">
                                                            <form action="pagar.php" method="POST">
                                                                <div class="row">
                                                                    <div class="single-input-item">
                                                                        <label for="country" class="required">¿Deseas
                                                                            Boleta o Factura?</label>
                                                                        <select required name="tipoc" id="country">
                                                                            <option value="Boleta">Boleta</option>
                                                                            <option value="Factura">Factura</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6" style="display:none;">
                                                                        <?php
                                                                        define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
                                                                        define("DB_NAME", "vetdog");//Nombre de la base de datos
                                                                        define("DB_USER", "root");//Usuario de tu base de datos
                                                                        define("DB_PASS", "");//Contraseña del usuario de la base de datos
                                                                        $con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                                                        if (!$con) {
                                                                            die("imposible conectarse: " . mysqli_error($con));
                                                                        }
                                                                        if (@mysqli_connect_errno()) {
                                                                            die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
                                                                        }
                                                                        $sql = mysqli_query($con, "select LAST_INSERT_ID(id_venta) as last from venta order by id_venta desc limit 0,1");
                                                                        $rws = mysqli_fetch_array($sql);
                                                                        $numero = $rws['last'] + 1;
                                                                        ?>
                                                                        <div class="single-input-item">
                                                                            <label for="f_name" class="required">numero
                                                                                factura</label>
                                                                            <input type="text" name="numfact"
                                                                                value="<?php echo $numero; ?>"
                                                                                placeholder="First Name" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="single-input-item"
                                                                        style="display:none;">
                                                                        <label for="f_name" class="required">tipo
                                                                            pa</label>
                                                                        <input type="text" name="tipopa" value="Tarjeta"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="single-input-item">
                                                                            <label for="f_name"
                                                                                class="required">Nombre</label>
                                                                            <input type="text"
                                                                                value="<?php echo ucfirst($_SESSION['nom_due']); ?>"
                                                                                placeholder="First Name" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" style="display:none;">
                                                                        <div class="single-input-item">
                                                                            <label for="f_name"
                                                                                class="required">ID</label>
                                                                            <input type="text" name="id_due"
                                                                                value="<?php echo ucfirst($_SESSION['id_due']); ?>"
                                                                                placeholder="First Name" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" style="display:none;">
                                                                        <div class="single-input-item">
                                                                            <label for="f_name"
                                                                                class="required">total</label>
                                                                            <input type="text" name="total"
                                                                                value="<?php echo number_format($total, 2); ?>"
                                                                                placeholder="First Name" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" style="display:none;">
                                                                        <div class="single-input-item">
                                                                            <label for="f_name"
                                                                                class="required">cantidad</label>
                                                                            <input type="text" name="canti"
                                                                                value="<?php echo $producto['CANTIDAD']; ?>"
                                                                                placeholder="First Name" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="single-input-item">
                                                                            <label for="l_name"
                                                                                class="required">Apellidos</label>
                                                                            <input type="text" id="l_name"
                                                                                value="<?php echo ucfirst($_SESSION['ape_due']); ?>"
                                                                                placeholder="Last Name" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="margin-top:20px;">
                                                                    <div class="col-lg-12 ml-auto">
                                                                        <label for="f_name" class="required">Trajeta de
                                                                            credito</label>
                                                                        <div class="panel">
                                                                            <div class="card-js stripe"
                                                                                data-stripe="true"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12 ml-auto">
                                                                        <div class="cart-calculator-wrapper">
                                                                            <div class="cart-calculate-items">
                                                                                <h3>Total del carrito</h3>
                                                                                <div class="table-responsive">
                                                                                    <table class="table">
                                                                                        <tr class="total">
                                                                                            <td>Total</td>
                                                                                            <td class="total-amount">
                                                                                                S/<?php echo number_format($total, 2); ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn__bg d-block">Finalizar
                                                                                compra</button>
                                                                        </div>
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
        <script src="../../assets/js/card-js.min.js"></script>
</body>
</html>